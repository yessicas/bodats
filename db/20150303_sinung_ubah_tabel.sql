INSERT INTO  `bussiness_type_order` (
`id_bussiness_type_order` ,
`bussiness_type_order` ,
`visible`
)
VALUES (
'250',  'TRANSHIPMENT',  '1'
);

CREATE TABLE IF NOT EXISTS `numbering_faktur` (
  `id_numbering` bigint(20) NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL,
  `status` set('NOT TAKEN','MANUAL TAKE','AUTOMATIC TAKE') NOT NULL DEFAULT 'NOT TAKEN',
  `notes` varchar(250) NOT NULL,
  `is_initial` int(1) NOT NULL DEFAULT '0',
  `id_invoice_voyage` bigint(20) NOT NULL,
  `taken_date` datetime NOT NULL,
  `user_taken` varchar(45) NOT NULL,
  `ip_user_taken` varchar(50) NOT NULL,
  KEY `id_numbering_invoice` (`id_numbering`),
  KEY `invoice_number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `numbering_invoice`
--

CREATE TABLE IF NOT EXISTS `numbering_invoice` (
  `id_numbering` bigint(20) NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL,
  `status` set('NOT TAKEN','MANUAL TAKE','AUTOMATIC TAKE') NOT NULL DEFAULT 'NOT TAKEN',
  `notes` varchar(250) NOT NULL,
  `is_initial` int(1) NOT NULL DEFAULT '0',
  `id_invoice_voyage` bigint(20) NOT NULL,
  `taken_date` datetime NOT NULL,
  `user_taken` varchar(45) NOT NULL,
  `ip_user_taken` varchar(50) NOT NULL,
  KEY `id_numbering_invoice` (`id_numbering`),
  KEY `invoice_number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;