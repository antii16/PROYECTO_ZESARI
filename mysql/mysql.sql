DROP DATABASE IF EXISTS proyectozesari;
CREATE DATABASE proyectozesari;
USE proyectozesari;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios`( 
`id`             int auto_increment not null,
`nombre`          varchar(100) COLLATE utf8mb4_unicode_ci not null,
`apellidos`       varchar(255) COLLATE utf8mb4_unicode_ci not null,
`email`           varchar(255) COLLATE utf8mb4_unicode_ci not null,
`password`        varchar(255) COLLATE utf8mb4_unicode_ci not null,
`fecha_nacimiento`  date COLLATE utf8mb4_unicode_ci,
`lugar_nacimiento`  varchar(255) COLLATE utf8mb4_unicode_ci, 
`direccion`       varchar(255) COLLATE utf8mb4_unicode_ci,
`telefono`       varchar(255) COLLATE utf8mb4_unicode_ci,
`telefono2`  varchar(255) COLLATE utf8mb4_unicode_ci,
`sexo`  varchar(20) COLLATE utf8mb4_unicode_ci,
`patologias`  text COLLATE utf8mb4_unicode_ci,
`imagen`          varchar(255),
`rol` varchar(20) COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_usuarios PRIMARY KEY(`id`),
CONSTRAINT uq_email UNIQUE(`email`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ALTER TABLE `clases`
--     ADD COLUMN `id_categoria` int COLLATE utf8mb4_unicode_ci not null,
--     ADD CONSTRAINT fk_clases_categoria FOREIGN KEY (`id_categoria`)
--         REFERENCES categorias(`id`);

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases`( 
`id`             int auto_increment not null,
`nombre`         varchar(255) not null,
`precio`       decimal COLLATE utf8mb4_unicode_ci,
`horario`       datetime COLLATE utf8mb4_unicode_ci,
`aforo`       varchar(255) COLLATE utf8mb4_unicode_ci,
`id_usuario_profesor`       int COLLATE utf8mb4_unicode_ci not null,
`id_categoria`       int COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_clases PRIMARY KEY(`id`),
CONSTRAINT fk_clases_profesor FOREIGN KEY(`id_usuario_profesor`) REFERENCES usuarios(`id`),
CONSTRAINT fk_clases_categoria FOREIGN KEY(`id_categoria`) REFERENCES categorias(`id`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias`(
    `id`         int auto_increment not null,
    `titulo`      varchar(255) COLLATE utf8mb4_unicode_ci not null,
    `descripcion` text COLLATE utf8mb4_unicode_ci,
    `imagen` varchar(255) COLLATE utf8mb4_unicode_ci,
    CONSTRAINT pk_categorias PRIMARY KEY(`id`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos`( 
`id`             int auto_increment not null,
`fecha`       date COLLATE utf8mb4_unicode_ci not null,
`tipo`       varchar(255) COLLATE utf8mb4_unicode_ci,
`estado`       varchar(255) COLLATE utf8mb4_unicode_ci,
`cantidad`       float(100,2) COLLATE utf8mb4_unicode_ci not null,
`id_cliente`       int COLLATE utf8mb4_unicode_ci,
`id_empleado_anota`       int COLLATE utf8mb4_unicode_ci,
`id_clase`         int COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_pagos PRIMARY KEY(`id`),
CONSTRAINT fk_pagos_clientes FOREIGN KEY(`id_cliente`) REFERENCES usuarios(`id`),
CONSTRAINT fk_pagos_empleados FOREIGN KEY(`id_empleado_anota`) REFERENCES usuarios(`id`),
CONSTRAINT fk_pagos_clases FOREIGN KEY(`id_clase`) REFERENCES clases(`id`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `matriculado`;
CREATE TABLE IF NOT EXISTS `matriculado`( 
`id`             int auto_increment not null,
`id_cliente`        int COLLATE utf8mb4_unicode_ci not null,
`id_clase`         int COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_matricula PRIMARY KEY(`id`),
CONSTRAINT fk_matricula_clientes FOREIGN KEY(`id_cliente`) REFERENCES usuarios(`id`),
CONSTRAINT fk_matricula_clases FOREIGN KEY(`id_clase`) REFERENCES clases(`id`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs`( 
`id`             int auto_increment not null,
`titulo`         varchar(255) not null,
`descripcion`        text COLLATE utf8mb4_unicode_ci,
`texto`       decimal COLLATE utf8mb4_unicode_ci,
`fecha`       varchar(255) COLLATE utf8mb4_unicode_ci,
`imagen`          varchar(255) COLLATE utf8mb4_unicode_ci,
`id_usuario_empleado`       int COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_clases PRIMARY KEY(`id`),
CONSTRAINT fk_usuario_blog FOREIGN KEY(`id_usuario_empleado`) REFERENCES usuarios(`id`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- INICIACION PILATES
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('4 sesiones individuales (IP)', 115, 1,4, 10, 16);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`,`id_usuario_profesor`, `id_categoria`) VALUES ('4 sesiones en pareja (IP)', 180, 2, 4, 10, 16);

--GRUPO STUDIO
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('1 clase a la semana (GS)', 60 , 5, 4, 10, 13);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('2 clases a la semana (GS)', 90 , 5, 8, 10, 13);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('3 clases a la semana (GS)', 105, 5, 12, 10, 13);

--MAT
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('1 clase a la semana (GM)', 40 , 6, 4, 10, 12);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('2 clases a la semana (GM)', 55 , 6, 8, 10, 12);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('3 clases a la semana (GM)', 75 , 6, 12, 10, 12);
-- --MAT + STUDIO
-- INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES (`1 clase STUDIO + 1 clase MAT`, 80, 5, 8, 1, 1); --AFORO? CATEGORIA? 
-- INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES (`1 clase STUDIO + 1 clase MAT`, 80, 6, 8, 1, 2); --AFORO? CATEGORIA? 

--ENTRENAMIENTO PERSONALIZADO
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('8 clases', 270 , 1, 8, 10, 14);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('10 clases', 320 , 1, 10, 10, 14);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('12 clases', 375 , 1, 12, 10, 14);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('15 clases', 450 , 1, 15, 10, 14);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('24 clases', 690 , 1, 24, 10, 14);

--QUIROMASAJE
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('4 sesiones', 90, 1, 4, 10, 18);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('8 sesiones', 170, 1, 8, 10, 18);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('10 clases', 205, 1, 10, 10, 18);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('20 clases', 105, 1, 20, 10, 18);

--CLASES SUELTAS
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('Clase suelta (GS)', 22, 1, 1, 10, 13);
INSERT INTO `clases` (`titulo`, `precio`, `aforo`, `cantidad_clases`, `id_usuario_profesor`, `id_categoria`) VALUES ('Clase suelta (GM)', 20, 1, 1, 10, 12);