create table if not exists tipo_estante(
    id_tipo_estante int primary key AUTO_INCREMENT not null,
    categoria varchar(20) not null,
    descripcion varchar(30)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not EXISTS estante(
    id_estante int primary key AUTO_INCREMENT not null,
    nombre varchar(20) not null,
    id_tipo_estante int not null,
    estado TINYINT(2) not null,
    foreign key(id_tipo_estante) references tipo_estante(id_tipo_estante)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not exists caja(
    id_caja int primary key AUTO_INCREMENT not null,
    codigo varchar(20) not null,
    estado TINYINT(2) not null,
    id_estante int not null,
    foreign key(id_estante) references estante(id_estante)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not exists expediente(
    id_expediente int primary key AUTO_INCREMENT not null,
    nombre_archivo varchar(30) not null,
    nr_fojas int not null,
    codigo_catastral varchar(30)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not exists usuario_externo(
    id_user_ex int primary key AUTO_INCREMENT not null,
    nombre varchar(50) not null,
    documento varchar(20) not null,
    direccion varchar(40) not null,
    tipo varchar(30),
    id_expediente int not null,
    foreign key(id_expediente) references expediente(id_expediente)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not exists rol(
    id_rol int not null auto_increment primary key,
    nombre varchar(40) not null,
    estado tinyint(2) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table if not exists trabajador(
    id_trabajador int PRIMARY key auto_increment not null,
    documento varchar(30) not null,
    nombre varchar(45) not null,
    correo varchar(45) not null,
    direccion varchar(45) not null,
    estado tinyint(2) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table if not exists usuario(
    id_usuario int not null auto_increment primary key,
    usuario varchar(20) not null,
    password varchar(20) not null,
    fecha date not null,
    id_rol int not null,
    id_trabajador int not null,
    estado TINYINT(2) not null,
    foreign key(id_trabajador) references trabajador(id_trabajador),
    foreign key(id_rol) references rol(id_rol)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
create table if not exists caja_usuario(
    id_caja_usuario int primary key AUTO_INCREMENT not null,
    id_caja int not null,
    id_user_ex int not null,
    fecha date not null,
    FOREIGN KEY(id_caja) REFERENCES caja(id_caja),
    FOREIGN KEY(id_user_ex) REFERENCES usuario_externo(id_user_ex)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;



create table if not exists vehiculo(
    id_vehiculo int primary key auto_increment not null,
    placa varchar(15) not null,
    estado tinyint(2) not null
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table if not exists tipo_salida(
    id_tipo_salida int primary key auto_increment not null,
    nombre varchar(25)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

create table if not exists salida(
    id_salida int primary key not null auto_increment,
    hora_retorno time not null,
    hora_exac_llegada time not null,
    hora_salida time not null,
    direccion_salida varchar(20) not null,
    motivo varchar(25) not null,
    observaciones varchar(30) not null,
    fecha date not null,
    id_vehiculo int not null,
    id_usuario int not null,
    id_tipo_salida int not null,
    estado tinyint(2) not null,
    foreign key(id_vehiculo) references vehiculo(id_vehiculo),
    foreign key(id_usuario) references usuario(id_usuario),
    foreign key(id_tipo_salida) references tipo_salida(id_tipo_salida)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

