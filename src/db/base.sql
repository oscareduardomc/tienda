create database shop_db;
use shop_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `stock_bUpdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `name`, `price`, `image`, `quantity`, `stock_bUpdate`) VALUES
(15, 1, 5, 'AirPods Lite', '70', 'product-5.jpg', 10, 45),
(20, 1, 4, 'Echo Dot 4', '49.99', 'product-4.jpg', 4, 13);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `products`
--
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`) VALUES
(2, 'Apple Watch', '499', 18, '572149.jpg'),
(3, 'Cámara Nikon', '1500', 9, 'product-3.jpg'),
(4, 'Echo Dot 4', '49.99', 9, 'product-4.jpg'),
(5, 'AirPods Lite', '70', 35, 'product-5.jpg'),
(6, 'Televisor Plano', '250', 5, 'product-6.jpg'),
(32, 'Samsung Galaxy A51', '300', 12, '780980.jpg');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `transactions`
--
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------