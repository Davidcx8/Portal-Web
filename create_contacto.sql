-- Tabla de contacto para el formulario de contacto
-- Esta tabla almacenará las consultas enviadas por los usuarios

CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
