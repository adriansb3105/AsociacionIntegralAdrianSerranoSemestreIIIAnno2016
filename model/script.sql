/****************************************** TABLES ******************************************/
CREATE TABLE tb_activity(	id varchar(5) not null PRIMARY KEY,
							date_day Date not null,
							start_time Time not null,
							end_time Time not null,
							hours Time not null,
							kind varchar(8) not null,
							description varchar(500) not null,
							total float not null);

CREATE TABLE tb_services(	id varchar(5) not null PRIMARY KEY,
							kitchen boolean not null,
							chairs_num int not null,
							tables_num int not null,
							tablecloths_num int not null);

CREATE TABLE tb_partner(	id varchar(10) not null PRIMARY KEY,
							first_name varchar(20) not null,
							last_name varchar(20) not null,
                            phone varchar(20) not null,
                            address varchar(100) not null,
                            email varchar(50) not null,
							pass varchar(50) not null);

CREATE TABLE tb_directorate(	id varchar(10) not null PRIMARY KEY,
								election_date Date not null,
                                position varchar(15) not null,
                                state boolean not null,
								Foreign Key(id) references tb_partner(id)
								ON DELETE CASCADE);

CREATE TABLE tb_employee(	id varchar(10) not null PRIMARY KEY,
							first_name varchar(20) not null,
							last_name varchar(20) not null,
                            email varchar(50) not null,
                            salary float not null,
                            pass varchar(50) not null,
                            position varchar(15) not null);

CREATE TABLE tb_employee_payment(	id varchar(10) not null,
									payment_date Date not null,
									amount float not null,
                                    PRIMARY KEY(id, payment_date),
									Foreign Key(id) references tb_employee(id)
                                    ON DELETE CASCADE);
                                    
CREATE TABLE tb_concept(	id int not null PRIMARY KEY,
							concept varchar(40) not null);
                            
CREATE TABLE tb_reunion(	reunion_date Date not null,
							doc_url varchar(100) not null,
							doc_name varchar(50) not null,
							description varchar(100) not null,
							PRIMARY KEY(reunion_date, doc_url));

CREATE TABLE tb_petty_cash(	id int not null AUTO_INCREMENT primary key,
							date_day Date not null,
                            id_concept int not null,
                            id_activity varchar(5) not null,
                            income float not null,
							outcome float not null,
                            total float not null,
                            Foreign Key(id_concept) references tb_concept(id) ON DELETE CASCADE);

  


/****************************************** STORE PROCEDURES ******************************************/
DELIMITER **
	CREATE PROCEDURE sp_reunion_insert(reunion_date_ Date, doc_url_ varchar(100), doc_name_ varchar(50), description_ varchar(100))
BEGIN
    INSERT INTO tb_reunion(reunion_date, doc_url, doc_name, description)
    VALUES(reunion_date_, doc_url_, doc_name_, description_);
END **


DELIMITER **
	CREATE PROCEDURE sp_concept(id_ int, concept_ varchar(40))
BEGIN
    INSERT INTO tb_concept(id, concept) VALUES(id_, concept_);
END **

    
DELIMITER **
	CREATE PROCEDURE sp_employee_payment_insert(id_ varchar(10), payment_date_ Date, amount_ float)
BEGIN
	INSERT INTO tb_employee_payment(id, payment_date, amount)
    VALUES(id_, payment_date_, amount_);
    CALL sp_petty_cash_outcome(payment_date_, 3, '', amount_);
END **


DELIMITER **
	CREATE PROCEDURE sp_employee_insert(id_ varchar(10), first_name_ varchar(20), last_name_ varchar(20),
								 email_ varchar(50), salary_ float, pass_ varchar(50), position_ varchar(15))
BEGIN
	INSERT INTO tb_employee(id, first_name, last_name, email, salary, pass, position)
    VALUES(id_, first_name_, last_name_, email_, salary_, pass_, position_);
END **


DELIMITER **
	CREATE PROCEDURE sp_directorate_insert(id_ varchar(10), election_date_ Date, position_ varchar(15), state_ boolean)
BEGIN
	INSERT INTO tb_directorate(id, election_date, position, state)
    VALUES(id_, election_date_, position_, state_);
END **


DELIMITER **
	CREATE PROCEDURE sp_partner_insert(id_ varchar(10), first_name_ varchar(20), last_name_ varchar(20), phone_ varchar(20),
								address_ varchar(100), email_ varchar(50), pass_ varchar(50))
BEGIN
	INSERT INTO tb_partner(id, first_name, last_name, phone, address, email, pass)
    VALUES(id_, first_name_, last_name_, phone_, address_, email_, pass_);
END **


DELIMITER **
CREATE PROCEDURE sp_internal_activity_insert(id_ varchar(5),date_day_ Date, start_time_ Time, end_time_ Time, description_ varchar(500))
BEGIN
	DECLARE hours_ TIME;
	SET hours_ = end_time_ - start_time_;
    
	INSERT INTO tb_activity(id, date_day, start_time, end_time, hours, kind, description, total)
					 VALUES(id_, date_day_, start_time_, end_time_, hours_, 'interna', description_, 0);
END **


DELIMITER **
CREATE PROCEDURE sp_public_activity_insert(id_ varchar(5), date_day_ Date, start_time_ Time, end_time_ Time,
							description_ varchar(500), kitchen_ boolean, chairs_num_ int, tables_num_ int,
                            tablecloths_num_ int, total_ float)
BEGIN
	DECLARE hours_ TIME;
	SET hours_ = end_time_ - start_time_;
    
	INSERT INTO tb_activity(id, date_day, start_time, end_time, hours, kind, description, total)
					 VALUES(id_, date_day_, start_time_, end_time_, hours_, 'publica', description_, total_);
                     
	INSERT INTO tb_services(id, kitchen, chairs_num, tables_num, tablecloths_num)
					VALUES(id_, kitchen_, chairs_num_, tables_num_, tablecloths_num_);
                    
                    
	SELECT @num_rows:= count(total) FROM tb_petty_cash;
    SELECT @prev_total:= total FROM tb_petty_cash WHERE id = @num_rows;
	CALL sp_petty_cash(date_day_, 1, id_, total_, 0, @prev_total + total_);

END **


DELIMITER **
	CREATE PROCEDURE sp_petty_cash(date_day_ Date, id_concept_ int, id_activity_ varchar(5), income_ float, outcome_ float, total_ float)
BEGIN
    INSERT INTO tb_petty_cash(date_day, id_concept, id_activity, income, outcome, total)
    VALUES(date_day_, id_concept_, id_activity_, income_, outcome_, total_);
END **


DELIMITER **
	CREATE PROCEDURE sp_petty_cash_income(date_day_ Date, id_concept_ int, id_activity_ varchar(5), income_ float)
BEGIN
	SELECT @num_rows:= count(total) FROM tb_petty_cash;
    SELECT @prev_total:= total FROM tb_petty_cash WHERE id = @num_rows;
    INSERT INTO tb_petty_cash(date_day, id_concept, id_activity, income, outcome, total)
    VALUES(date_day_, id_concept_, id_activity_, income_, 0, @prev_total + income_);
END **

DELIMITER **
	CREATE PROCEDURE sp_petty_cash_outcome(date_day_ Date, id_concept_ int, id_activity_ varchar(5), outcome_ float)
BEGIN
	SELECT @num_rows:= count(total) FROM tb_petty_cash;
    SELECT @prev_total:= total FROM tb_petty_cash WHERE id = @num_rows;
    INSERT INTO tb_petty_cash(date_day, id_concept, id_activity, income, outcome, total)
    VALUES(date_day_, id_concept_, id_activity_, 0, outcome_, @prev_total - outcome_);
END **


DELIMITER **
	CREATE PROCEDURE sp_public_activity_select_all()
BEGIN
	SELECT id, date_day, start_time, end_time, hours, description FROM tb_activity WHERE kind = 'publica';
END **

DELIMITER **
	CREATE PROCEDURE sp_find_employee(email_ varchar(50), pass_ varchar(50))
BEGIN
	SELECT id, first_name, last_name, position from tb_employee WHERE email_ = email and pass_ = pass;
END **

DELIMITER **
	CREATE PROCEDURE sp_find_partner(email_ varchar(50), pass_ varchar(50))
BEGIN
	SELECT id, first_name, last_name, phone, address from tb_employee WHERE email_ = email and pass_ = pass;
END **

/****************************************** TESTS ******************************************/
CALL sp_reunion_insert('2015-04-30', 'http://dropbox.com/ygakdygrdyvjgktujv6326ugr6erg', 'dweweo', 'se hsdd papaya hoy');
CALL sp_employee_insert('0115710825', 'Adrian', 'Serrano', 'add@uakjsd.cc', 250000, 'askdnjkansd', 'dona todo');
CALL sp_employee_payment_insert('0115710825', '2016-02-04', 250000);
CALL sp_partner_insert('2225556663', 'Juan', 'Jonas', '8265131535118', 'por ahi', 'asudknds@sda.as', 'asdsc');
CALL sp_directorate_insert('2225556663', '2000-05-25', 'Fiscal', true);
CALL sp_internal_activity_insert('hf53r', '2017-02-14', '08:25:32', '09:25:00', 'buena onda');
CALL sp_public_activity_insert('5sdf1', '2017-02-17', '10:00:00', '12:00:00', 'descript', true, 200, 50, 45, 5608)
CALL sp_petty_cash_income('2017-02-13', 6, 'hf53r', 2000);
CALL sp_petty_cash_outcome('2017-02-13', 7, '', 4000);

CALL sp_public_activity_select_all();

/****************************** OBLIGATORIES SCRIPTS**********************************/
CALL sp_concept(1, 'Alquiler del Salon Comunal');
CALL sp_concept(2, 'Alquiler del Local Comercial');
CALL sp_concept(3, 'Pago de empleados');
CALL sp_concept(4, 'Compra de articulos');
CALL sp_concept(5, 'Reparacion');
CALL sp_concept(6, 'Otra entrada');
CALL sp_concept(7, 'Otra Salida');
CALL sp_petty_cash('2017-02-12', 6, '', 0, 0, 10000000);
/************************************************************************************/


SELECT * FROM tb_activity;

delete from tb_activity where id!='1';

drop procedure sp_public_activity_select_all;

drop table tb_activity;