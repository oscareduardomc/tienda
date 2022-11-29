# Crear la base de datos
CREATE DATABASE tienda_master;

# Usar la base de datos
USE tienda_master;

# Crear tabla de Usuarios 
CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
imagen          varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

# Insertar un registro en la tabla usuarios
INSERT INTO usuarios 
VALUES(NULL, 'Admin','Admin', 'admin@admin.com', 'contraseña', 'admin', NULL);

# Crear tabla de categorias
CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;

# Insertar registros en la tabla de categorias
INSERT INTO categorias VALUES(NULL, 'Manga corta');
INSERT INTO categorias VALUES(NULL, 'Tirantes');
INSERT INTO categorias VALUES(NULL, 'Manga larga');
INSERT INTO categorias VALUES(NULL, 'Sudaderas');

# Crear tabla de productos
CREATE TABLE  productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;

# Crear tabla de carrito
CREATE TABLE  carrito(
id             int(255) auto_increment not null,
producto_id    int(255) not null,
usuario_id     int(255) not null,

CONSTRAINT pk_carrito PRIMARY KEY(id),
CONSTRAINT fk_carrito_producto FOREIGN KEY(producto_id) REFERENCES productos(id),
CONSTRAINT fk_carrito_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

# Crear tabla de pedidos
CREATE TABLE  pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
direccion       varchar(255) not null,
coste           float(200,2) not null,
estado          varchar(20) not null,
fecha           date not null,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

# Crear tabla de lineaspedido
CREATE TABLE  lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDB;