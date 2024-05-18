CREATE TABLE IF NOT EXISTS moo_kriteria(
  id_criteria TINYINT(3) UNSIGNED AUTO_INCREMENT,
  kriteria VARCHAR(100) NOT NULL,
  type SET('benefit','cost') NOT NULL,
  bobot FLOAT NOT NULL,
  PRIMARY KEY(id_criteria)
)ENGINE=InnoDB;

INSERT INTO moo_kriteria(id_criteria,kriteria,type,bobot)
VALUES
(1,'English','benefit', 0),
(2,'Kiswahili','benefit', 0),
(3,'Mathematics','cost', 0),
(4,'Biology','benefit', 0),
(5,'Chemistry','cost', 0),
(6,'Physics','benefit', 0),
(7,'CRE/IRE','benefit', 0),
(8,'GEO/HIS','benefit', 0),
(9,'Elective','benefit', 0);

/*Values set to zero since each submission of subject score updates the table*/