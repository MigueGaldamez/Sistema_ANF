-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2021 a las 08:19:00
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_anf`
--

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `codigoCuenta`, `nombreCuenta`, `naturaleza`, `clase`, `created_at`, `updated_at`) VALUES
(1, '1 ', 'Activo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '11 ', 'Activo Corriente ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1101 ', 'Efectivo Y Equivalentes De Efectivo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '1101.01 ', 'Caja General ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '1101.02 ', 'Caja Chica ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '1101.03 ', 'Bancos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1101.03.01 ', 'Cuenta Corriente ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '1101.03.01.01 ', 'Banco Agrícola ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '1101.03.01.02 ', 'Banco Citibank ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '1101.03.02 ', 'Cuenta De Ahorro ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '1101.03.02.01 ', 'Banco Agrícola ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '1101.03.02.02 ', 'Banco Citibank ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1101.03.03 ', 'Depósitos A Plazo Menos De Un Año ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '1101.03.03.01 ', 'Banco Agrícola ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1101.03.03.02 ', 'Banco Citibank ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '1101.04 ', 'Equivalentes De Efectivo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1101.04.01 ', 'Reportos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1102 ', 'Cuentas Y Documentos Por Cobrar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '1102.01 ', 'Clientes ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '1102.02R ', 'Estimación Para Cuentas Incobrables ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '1102.03 ', 'Documentos Por Cobrar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '1102.04 ', 'Otras Cuentas Por Cobrar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '1102.05 ', 'Préstamos A Empleados ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '1102.06 ', 'Anticipos Sobre Sueldos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '1102.07 ', 'Faltantes De Caja ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '1102.08 ', 'Cheques Rechazados ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '1102.09 ', 'Préstamos A Accionistas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '1103 ', 'Cuentas Por Cobrar Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '1103.01 ', 'Arrendamiento Financiero Por Cobrar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '1103.02R ', 'Estimación Para Cuentas Incobrables De Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '1104 ', 'Inventarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '1104.01 ', 'Artículos Para El Hogar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '1104.01.01 ', 'Decoración ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '1104.01.02 ', 'Limpieza ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '1104.01.03 ', 'Cocina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '1104.01.04 ', 'Muebles ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '1104.01.05 ', 'Otros ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '1105 ', 'Pedidos En Transito ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '1106R ', 'Reserva Para Obsolescencia De Inventarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '1107 ', 'Inversiones Temporales ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '1107.01 ', 'Acciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '1107.02 ', 'Bonos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '1108 ', 'Partes Relacionadas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '1108.01 ', 'Directores, Ejecutivos Y Empleados ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '1108.02 ', 'Compañías Afiliadas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '1108.03 ', 'Compañías Asociadas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '1108.04 ', 'Compañías Subsidiarias ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '1109 ', 'Gastos Pagados Por Anticipado ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '1109.01 ', 'Alquileres ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '1109.02 ', 'Seguros Y Fianzas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '1109.03 ', 'Propaganda Y Publicidad ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '1109.04 ', 'Intereses ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '1109.05 ', 'Papelería ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '1109.07 ', 'Membresías Y Suscripciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '1109.09 ', 'Otros ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '1110 ', 'Iva - Crédito Fiscal ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '1110.01 ', 'Crédito Fiscal - Iva ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '1111 ', 'Pago A Cuenta-Impuesto S/ Renta ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '1112 ', 'Dividendos Por Cobrar ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '1113 ', 'Activos No Corrientes Mantenidos Para La Venta ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '12 ', 'Activo No Corriente ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '1201 ', 'Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '1201.01 ', 'Terrenos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '1201.02 ', 'Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '1201.03 ', 'Equipo De Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '1201.04 ', 'Mobiliario Y Equipo De Oficina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '1201.05 ', 'Otros Activos Fijos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '1202R ', 'Depreciación Acum. De Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '1202.01 ', 'Depreciación Acumulada De Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '1202.02 ', 'Depreciación Acumulada De Equipo De Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '1202.03 ', 'Depreciación Acumulada De Mobiliario Y Equipo De Oficina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '1202.04 ', 'Depreciación Acumulada De Otros Activos Fijos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '1203R ', 'Deterioro Acum. De Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '1203.01 ', 'Terrenos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '1203.02 ', 'Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '1203.03 ', 'Equipo De Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '1203.04 ', 'Mobiliario Y Equipo De Oficina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '1203.05 ', 'Otros Activos Fijos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '1204 ', 'Revaluación De Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '1204.01 ', 'Revaluaciones De Terreno ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '1204.02 ', 'Revaluaciones De Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '1205R ', 'Depreciación De Revaluos De Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '1205.01 ', 'Revaluaciones De Terreno ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '1205.02 ', 'Revaluaciones De Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '1206 ', 'Propiedad Planta Y Equipo En Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '1206.01 ', 'Terrenos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '1206.02 ', 'Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '1206.03 ', 'Equipo De Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '1206.04 ', 'Mobiliario Y Equipo De Oficina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '1206.05 ', 'Otros Activos Fijos En Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '1207R ', 'Depreciación Acumulada De Propiedad Planta Y Eq. En Arrendamiento Financiero', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '1207.01 ', 'Depreciación De Edificios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '1207.02 ', 'Depreciación De Equipo De Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '1207.03 ', 'Depreciación De Mobiliario Y Equipo De Oficina ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '1207.04 ', 'Depreciación De Otros Activos Fijos En Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '1208 ', 'Construcción En Proces ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '1209 ', 'Inversiones Permanentes ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '1209.01 ', 'Inversiones En Subsidiarias ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '1209.02 ', 'Inversiones En Asociadas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '1209.03', 'Inversiones En Negocios Conjuntos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '1210', 'Impuesto Sobre La Renta Diferido Cuenta De Activo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '1211', 'Activos Intangibles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '1211.01', 'Derecho De Llave', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '1211.01.01', 'Costo De Adquisición Derecho De Llave', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '1211.02', 'Patentes Y Marcas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, '1211.02.01	', 'Costo De Adquisición Patentes Y Marcas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, '1211.03', 'Licencias', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, ' 1211.03.01', 'Costo De Adquisición De Licencias', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '1211.03', 'Programas Y Sistemas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '1211.03.01', 'Costo De Adquisición De Programas Y Sistemas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '1212R', 'Amortización De Intangibles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '1212.01', 'Derecho De Llave', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '1212.02', 'Patentes Y Marcas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '1212.03', 'Licencias', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '1212.04', 'Programas Y Sistemas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '1213R', 'Deterioro Acumulado De Activos Intangibles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '1213.01', 'Derecho De Llave', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '1213.02', 'Patentes Y Marcas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '1213.03', 'Licencias', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '1213.04', 'Programas Y Sistemas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '1214', 'Cuentas Y Documentos Por Cobrar Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '1214.01', 'Cuentas Por Cobrar Comerciales Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, '1214.02R', 'Estimación Para Cuentas Incobrables Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '1214.03', 'Préstamos Al Personal Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, '1215', 'Préstamos A Accionistas Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, '1216', 'Otras Cuentas Por Cobrar Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, '1217', 'Depositos En Garantia Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '1218', 'Cuentas Por Cobrar Arrendamiento Financiero Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '1218.01', 'Arrendamiento Financiero Lago Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '1218.02R', 'Estimación Para Cuentas Incobrables Arrendamiento Financiero', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '1219', 'Partes Relacionadas Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, '1219.01', 'Directores, Ejecutivos Y Empleados Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '1219.02', 'Compañías Afiliadas Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '1219.03', 'Compañías Asociadas Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '1219.04', 'Compañías Subsidiarias Largo Plazo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, '2', 'Pasivo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, '21', 'Pasivo Corriente', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, '2101', 'Préstamos Y Sobregiros Bancarios', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, '2101.01', 'Préstamos Bancarios Corto Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '2101.01.01', 'Banco Agrícola', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '2101.01.02', 'Banco Citibank', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '2101.02', 'Sobregiros Bancarios', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '2101.02.01', 'Banco Agrícola', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '2101.02.02', 'Banco Citibank', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '2101.02.03', 'Préstamos De Accionistas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '2101.02.04', 'Porción Circulante De Préstamos A Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '2102', 'Cuentas Y Documentos Por Pagar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '2102.01', 'Proveedores', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '2102.01.01', 'Proveedores Locales', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '2102.01.02', 'Proveedores Del Exterior', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, '2102.02', 'Documentos Por Pagar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '2102.02.01', 'Contratos A Corto Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '2102.02.02 ', 'Pagarés ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '2102.03 ', 'Letras De Cambio ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '2103 ', 'Porción Circulante De Arrendamiento Financiero Largo Plazo ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '2103.01 ', 'Obligación Por Arrendamiento Financiero Largo Plazo. ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '2104 ', 'Provisiones Y Retenciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, '2104.01 ', 'Provisiones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, '2104.01.01 ', 'Isss ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '2104.01.02 ', 'Afp Crecer ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, '2104.01.03 ', 'Afp Confía ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, '2104.01.04 ', 'Ipsfa ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, '2104.01.05 ', 'Insaforp ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, '2104.01.06 ', 'Inpep ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, '2104.01.07 ', 'Anda ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, '2104.01.08 ', 'Clessa ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, '2104.01.09 ', 'Telecomunicaciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, '2104.01.10 ', 'Alquileres ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '2104.01.11 ', 'Otros ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, '2104.02 ', 'Retenciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, '2104.02.01 ', 'Isss ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, '2104.02.02 ', 'Afp Crecer ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '2104.02.03 ', 'Afp Confía ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, '2104.02.04 ', 'Ipsfa ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, '2104.02.05 ', 'Inpep ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '2104.02.06 ', 'Impuesto Sobre La Renta Permanentes ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, '2104.02.07 ', 'Impuesto Sobre La Renta Eventuales ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, '2104.02.08 ', 'Préstamos Bancarios ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, '2104.02.09 ', 'Procuraduría ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, '2104.02.10 ', 'Otras Retenciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, '2105 ', 'Beneficios A Empleados Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, '2105.01 ', 'Beneficios A Empleados Por Pagar Corto Plazo ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, '2105.01.01 ', 'Planillas Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, '2105.01.02 ', 'Comisiones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, '2105.01.03 ', 'Bonificaciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, '2105.01.04 ', 'Vacaciones ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, '2105.01.05 ', 'Aguinaldos ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, '2105.01.06 ', 'Otros ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, '2106 ', 'Acreedores Varios ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, '2106.01 ', 'Compra De Bienes Muebles E Inmuebles ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, '2106.01.01 ', 'Bienes Muebles ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, '2106.01.02 ', 'Bienes Inmuebles ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, '2106.02 ', 'Otros ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, '2107 ', 'Dividendos Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, '2108 ', 'Iva - Debito Fiscal ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, '2108.01 ', 'Débito Fiscal - Iva ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, '2109 ', 'Impuestos Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, '2109.01 ', 'Iva Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, '2109.02 ', 'Impuesto Sobre La Renta Corriente ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, '2109.03 ', 'Pago A Cuenta ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, '2109.04 ', 'Impuestos Municipales ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, '2110 ', 'Intereses Por Pagar ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, '2110.01 ', 'Intereses Por Préstamos A Bancarios ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '2110.02 ', 'Intereses Por Pagos Tardíos ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, '2111 ', 'Partes Relacionadas Corto Plazo ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, '2111.01', 'Directores, Ejecutivos Y Empleados Corto Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, '2111.02', 'Compañías Afiliadas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, '2111.03', 'Compañías Asociadas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, '2111.04', 'Compañías Subsidiarias', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, '22', 'Pasivo No Corriente', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, '2201', 'Préstamos Bancarios A Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, '2201.01', 'Préstamos Hipotecarios A Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, '2202', 'Documentos Por Pagar - Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, '2202.01', 'Contratos A Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, '2202.02', 'Pagarés', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, '2202.03', 'Letras De Cambio', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, '2203', 'Obligaciones Por Arrendamiento Financiero Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, '2203.01', 'Contratos Bajo Arrendamiento Financiero Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, '2204', 'Impuesto Sobre La Renta Diferido Cuenta Pasivo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, '2204.01', 'Impuesto Sobre La Renta De Años Anteriores', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, '2205', 'Beneficios A Empleados Por Pagar Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, '2105.01', 'Beneficios Por Terminación De Empleos Por Pagar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, '2105.01.01', 'Indemnizaciones Por Pagar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, '2206', 'Partes Relacionadas Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, '2206.01', 'Directores, Ejecutivos Y Empleados Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, '2206.02', 'Compañías Afiliadas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, '2206.03', 'Compañías Asociadas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, '2206.04', 'Compañías Subsidiarias', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, '3', 'Patrimonio', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, '31', 'Capital Contable', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, '3101', 'Capital Social', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, '3101.01', 'Capital Social Suscrito', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, '3101.01.01', 'Capital Social Mínimo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, '3101.01.02', 'Capital Social Variable', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, '3101.02R', 'Capital Social No Pagado', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, '3101.02.01R', 'Capital Social Mínimo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, '3101.02.02R', 'Capital Social Variable', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, '3102', 'Superavit Por Revaluacion De Propiedad Planta Y Equipo No Realizada', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, '3103', 'Reserva Legal', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, '3104', 'Utilidades Por Distribuir', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, '3104.01', 'Utilidades De Ejercicios Anteriores', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, '3104.02', 'Utilidad Del Ejercicio', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, '3105', 'Superavit Por Revaluacion De Propiedad Planta Y Equipo Realizado', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, '3106R', 'Deficit Acumulado', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, '3106.01R', 'Pérdidas De Ejercicios Anteriores', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, '3106.02R', 'Pérdida Del Ejercicio Corriente', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, '4', 'Cuentas De Resultado Deudoras', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, '41', 'Costos Y Gastos De Operación', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, '4101', 'Costo De Venta', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, '4101.01', 'Artículos Para El Hogar', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, '4101.01.01', 'Decoración', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, '4101.01.02', 'Limpieza', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, '4101.01.03', 'Cocina', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, '4101.01.04', 'Muebles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, '4101.01.05', 'Otros', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, '4102', 'Gastos De Venta', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, '4102.01 ', 'Sueldos Y Salarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, '4102.02 ', 'Horas Extras ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, '4102.03 ', 'Honorarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, '4102.04 ', 'Vacaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, '4102.05 ', 'Aguinaldos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, '4102.06 ', 'Bonificaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, '4102.07 ', 'Incapacidades ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, '4102.08 ', 'Indemnizaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, '4102.09 ', 'Seguros De Vida ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, '4102.10 ', 'Comisiones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, '4102.11 ', 'Cuota Patronal – Isss ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, '4102.12 ', 'Cuota Patronal Fondo De Pensiones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, '4102.13 ', 'Cuota Patronal Insaforp ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, '4102.14 ', 'Pasajes Y Viáticos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, '4102.15 ', 'Transporte ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, '4102.16 ', 'Papelería Y Útiles ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, '4102.17 ', 'Impuestos Municipales ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, '4102.18 ', 'Estimación Para Cuentas Incobrables ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, '4102.19 ', 'Depreciación De Propiedad Planta Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, '4102.20 ', 'Depreciación Por Arrendamiento Financiero ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, '4102.21 ', 'Seguro De Vehículos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, '4102.22 ', 'Combustible Y Lubricantes ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, '4102.23 ', 'Mantenimiento De Vehículos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, '4102.24 ', 'Mantenimiento De Mobiliario Y Equipo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, '4102.25 ', 'Mantenimiento De Locales ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, '4102.26 ', 'Alquiler De Establecimiento ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, '4102.27 ', 'Artículos De Aseo Y Limpieza ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, '4102.28 ', 'Tarjeta De Circulación De Vehículos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, '4102.29 ', 'Servicios De Correo ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, '4102.30 ', 'Herramientas, Repuestos Y Accesorios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, '4102.31 ', 'Atención Al Personal ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, '4102.32 ', 'Material De Empaque ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, '4102.33 ', 'Propaganda Y Publicidad ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, '4102.34 ', 'Amortización De Intangibles ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, '4102.35 ', 'Seguridad Privada ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, '4102.36 ', 'Donaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, '4102.37 ', 'Capacitaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, '4102.38 ', 'Gastos Por Obsolescencia ', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, '4102.39 ', 'Fletes ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, '4102.40 ', 'Otros ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, '4103 ', 'Gastos De Administración ', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, '4103.01 ', 'Sueldos Y Salarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, '4103.02 ', 'Horas Extras ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, '4103.03 ', 'Honorarios ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, '4103.04 ', 'Dietas ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, '4103.05 ', 'Vacaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, '4103.06 ', 'Aguinaldos ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, '4103.07 ', 'Bonificaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, '4103.08 ', 'Incapacidades ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, '4103.09 ', 'Indemnizaciones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, '4103.10 ', 'Seguros De Vida ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, '4103.11 ', 'Cuota Patronal - Isss ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, '4103.12 ', 'Cuota Patronal Fondo De Pensiones ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, '4103.13 ', 'Cuota Patronal Insaforp ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, '4103.14', 'Pasajes Y Viáticos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, '4103.15', 'Transporte', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, '4103.16', 'Papelería Y Útiles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, '4103.17', 'Impuestos Municipales', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, '4103.18', 'Depreciación De Propiedad Planta Y Equipo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, '4103.19', 'Depreciación Por Arrendamiento Financiero', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, '4103.2', 'Seguro De Vehículos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, '4103.21', 'Combustible Y Lubricantes', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, '4103.22', 'Mantenimiento De Vehículos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, '4103.23', 'Mantenimiento De Mobiliario Y Equipo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, '4103.24', 'Alquiler De Establecimiento', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, '4103.25', 'Artículos De Aseo Y Limpieza', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, '4103.26', 'Tarjeta De Circulación De Vehículos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, '4103.27', 'Servicios De Correo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, '4103.28', 'Herramientas, Repuestos Y Accesorios', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, '4103.29', 'Atención Al Personal', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, '4103.3', 'Amortización De Intangibles', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, '4103.31', 'Seguridad Privada', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, '4103.32', 'Donaciones', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, '4103.33', 'Capacitaciones', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, '4103.34', 'Otros', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, '4104', 'Impuesto Sobre La Renta', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, '4104.01', 'Impuesto Sobre La Renta Corriente', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, '4104.02', 'Impuesto Sobre La Renta Diferido - Activo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, '4104.03', 'Impuesto Sobre La Renta Diferido - Pasivo', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, '4105', 'Gastos Financieros', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, '4105.01', 'Intereses', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, '4105.02', 'Comisiones Bancarias', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, '4105.03', 'Descuentos', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, '4105.04', 'Otros', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, '4106', 'Pérdida Por Venta De Activos No Corrientes Mantenidos Para La Venta', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, '5', 'Cuentas De Resultado Acreedoras', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, '51', 'Ingresos De Operación', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, '5101', 'Ingresos Por Ventas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, '5101.01', 'Artículos Para El Hogar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, '5101.01.01', 'Decoración', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, '5101.01.02', 'Limpieza', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, '5101.01.03', 'Cocina', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, '5101.01.04', 'Muebles', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, '5101.01.05', 'Otros', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, '5102', 'Productos Financieros', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, '5102.01', 'Intereses Bancarios', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, '5102.02', 'Comisiones', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, '5102.03', 'Descuentos', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, '5102.04', 'Diferenciales Cambiarios', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, '5102.05', 'Otros Productos Financieros', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, '5103', 'Pérdida Por Venta De Activos No Corrientes Mantenidos Para La Venta', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, '6', 'Cuenta Liquidadora O De Cierre', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, '61', 'Cuenta Liquidadora O De Cierre', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, '6101', 'Pérdidas Y Ganancias', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, '7', 'Cuentas De Memorandum Deudoras', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, '71', 'Cuentas De Orden Deudoras', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, '7101', 'Cuentas De Orden Deudoras', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, '8', 'Cuentas De Memorandum Acreedoras', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, '81', 'Cuentas De Orden Acreedoras', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, '8101', 'Cuentas De Orden Acreedoras', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, '01101', 'Cuentas Por Cobrar Clientes', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, '01102', 'Iva Credito Fiscal', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, '01201', 'Propiedad Planta Y Equipo Neto', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, '02101', 'Cuentas Por Pagar Proveedores', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, '02102', 'Cuentas Por Pagar A Partes Relacionadas', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, '02103', 'Provisiones Y Retenciones Por Pagar', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, '9', 'Documentos Por Pagar A Largo Plazo', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, '9', 'Pasivo Por Impuesto Sobre La Renta Diferido', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, '9', 'Utilidades Por Distrubuir', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, '04101', 'Costo por servicios', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, '10', 'Otros ingresos ', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, '10', 'Gastos de operación', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, '04103', 'Gastos de ventas', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, '04102', 'Gastos de administración', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, '04104', 'Gastos financieros', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, '05102', 'Utilidad antes de impuesto sobre la renta', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, '10', 'Gasto por impuesto sobre la renta', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, '05103', 'Utilidad neta', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, '05101', 'Utilidad bruta', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, '0011', 'Total Activo Corriente', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, '0012', 'Total Activo No Corriente', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, '0010', 'Total Activo', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, '0021', 'Total Pasivo Corriente', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, '0022', 'Total De Pasivo No Corriente', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, '0020', 'Total De Pasivo', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, '0031', 'Total Patrimonio', 2, 3,'0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, '0030', 'Total Pasivo Y Patrimonio Neto', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, '13', 'Cuentas Por Cobrar A Partes Relacionadas', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
