CREATE TABLE coche(
    matricula VARCHAR(7) NOT NULL PRIMARY KEY,
    marca VARCHAR(45) NOT NULL,
    modelo VARCHAR(45) NOT NULL,
    caballos INT(11) NOT NULL
);

CREATE TABLE persona (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    apellidomadre VARCHAR(100) NULL,
    DNI VARCHAR(10) NOT NULL
);

CREATE TABLE cochepersona(
     coche_matricula VARCHAR(7) NOT NULL,
     id_persona INT(11) NOT NULL,
     KEY coche_matricula (coche_matricula),
     CONSTRAINT cochematricula_FK
     FOREIGN KEY (coche_matricula)
     REFERENCES coche(matricula),
     KEY id_persona(id_persona),
     CONSTRAINT id_personaFK
     FOREIGN KEY (id_persona)
     REFERENCES persona(id)
     );



-- Consulta para buscar en la tabla cochepersona y referenciar los datos de las tablas coche y persona
SELECT cp.coche_matricula, c.marca, c.modelo, p.nombre, p.apellido
FROM cochepersona cp
JOIN coche c ON cp.coche_matricula = c.matricula
JOIN persona p ON cp.id_persona = p.id;