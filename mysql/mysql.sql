DROP DATABASE IF EXISTS proyectozesari;
CREATE DATABASE proyectozesari;
USE proyectozesari;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias`(
    `id`         int auto_increment not null,
    `titulo`      varchar(255) COLLATE utf8mb4_unicode_ci not null,
)
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
`n_seguridad_social`       varchar(255) COLLATE utf8mb4_unicode_ci,
`sexo`  varchar(20) COLLATE utf8mb4_unicode_ci,
`patologias`  text COLLATE utf8mb4_unicode_ci,
`imagen`          varchar(255),
`rol` varchar(20) COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_usuarios PRIMARY KEY(`id`),
CONSTRAINT uq_email UNIQUE(`email`)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases`( 
`id`             int auto_increment not null,
`nombre`         varchar(255) not null,
`descripcion`         text COLLATE utf8mb4_unicode_ci,
`precio`       decimal COLLATE utf8mb4_unicode_ci,
`horario`       varchar(255) COLLATE utf8mb4_unicode_ci,
`aforo`       varchar(255) COLLATE utf8mb4_unicode_ci,
`imagen`          varchar(255),
`id_usuario_profesor`       int COLLATE utf8mb4_unicode_ci not null,
CONSTRAINT pk_clases PRIMARY KEY(`id`),
CONSTRAINT fk_clases_profesor FOREIGN KEY(`id_usuario_profesor`) REFERENCES usuarios(`id`)
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
CONSTRAINT pk_pagos PRIMARY KEY(`id`),
CONSTRAINT fk_pagos_clientes FOREIGN KEY(`id_cliente`) REFERENCES usuarios(`id`),
CONSTRAINT fk_pagos_empleados FOREIGN KEY(`id_empleado_anota`) REFERENCES usuarios(`id`)
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