// insert "NONE" to table resign_reason
INSERT INTO `zohobiz`.`resign_reason` (
`id` ,
`title` ,
`created_on` ,
`created_by` ,
`edited_on` ,
`edited_by` ,
`is_deleted` ,
`deleted_on` ,
`deleted_by`
)
VALUES (
'4', 'None', '2015-04-28 00:00:00', '1', '', '', '0', '', ''
);



// insert record into table award_warning_type
INSERT INTO `zohobiz`.`award_warning_type` (
`id` ,
`title` ,
`created_on` ,
`created_by` ,
`edited_on` ,
`edited_by` ,
`is_deleted` ,
`deleted_on` ,
`deleted_by`
)
VALUES (
NULL , 'SP 1', '2015-04-28 00:00:00', '1', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0'
), (
NULL , 'SP 2', '2015-04-28 00:00:00', '1', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0'
),(
NULL , 'SP 3', '2015-04-28 00:00:00', '1', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0'
),(
NULL , 'Award', '2015-04-28 00:00:00', '1', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0'
);



// insert education group
INSERT INTO `education_group` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Sekolah Dasar', '2015-04-28 00:00:00', 1, '2015-04-28 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Sekolah Menengah Pertama', '2015-04-28 00:00:00', 1, '2015-04-28 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Sekolah Menengah Atas / Kejuruan', '2015-04-28 00:00:00', 1, '2015-04-28 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(4, 'Akademi/Institut/Politeknik/Sekolah tinggi/Universitas', '2015-04-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);



// insert education degree

INSERT INTO `education_degree` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Sarjana', '2015-04-28 00:00:00', 1, '2015-04-28 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Magister', '2015-04-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Doktor', '2015-04-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),;
(4, 'None', '2015-04-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);
