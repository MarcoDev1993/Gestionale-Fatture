-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 05, 2021 alle 18:06
-- Versione del server: 10.1.29-MariaDB
-- Versione PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `codart` char(10) NOT NULL,
  `desart` char(40) NOT NULL,
  `umis` char(3) NOT NULL,
  `prezzo` decimal(12,5) NOT NULL,
  `aliva` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `codice` int(5) NOT NULL,
  `ragsoc` char(50) NOT NULL,
  `indi` char(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `citta` char(50) NOT NULL,
  `prov` char(2) NOT NULL,
  `cfiscale` char(16) NOT NULL,
  `piva` char(11) NOT NULL,
  `codpag` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `clienti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura_m`
--

CREATE TABLE `fattura_m` (
  `FAT_NUM` int(6) NOT NULL,
  `FAT_DATA` datetime NOT NULL,
  `FAT_CODICE` int(5) NOT NULL,
  `FAT_CODPAG` int(4) NOT NULL,
  `FAT_TOTIMP` decimal(12,5) NOT NULL,
  `FAT_TOTIVA` int(11) NOT NULL,
  `FAT_TOTALE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fattura_m`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `fattura_r`
--

CREATE TABLE `fattura_r` (
  `fat_num` int(6) NOT NULL,
  `fat_riga` int(3) NOT NULL,
  `fat_codart` char(10) NOT NULL,
  `fat_desart` char(40) NOT NULL,
  `fat_umis` char(3) NOT NULL,
  `fat_prezzo` decimal(10,2) NOT NULL,
  `fat_importo` decimal(12,5) NOT NULL,
  `fat_aliva` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fattura_r`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`codart`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `fattura_m`
--
ALTER TABLE `fattura_m`
  ADD PRIMARY KEY (`FAT_NUM`);

--
-- Indici per le tabelle `fattura_r`
--
ALTER TABLE `fattura_r`
  ADD PRIMARY KEY (`fat_num`,`fat_riga`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `codice` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `fattura_m`
--
ALTER TABLE `fattura_m`
  MODIFY `FAT_NUM` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
