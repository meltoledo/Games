CREATE TABLE console (
  idconsole INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NULL,
  PRIMARY KEY(idconsole)
);

CREATE TABLE game (
  idgame INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  console_idconsole INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(80) NULL,
  PRIMARY KEY(idgame),
  INDEX game_FKIndex1(console_idconsole),
  FOREIGN KEY(console_idconsole)
    REFERENCES console(idconsole)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


