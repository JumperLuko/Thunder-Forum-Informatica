INSERT INTO `category_user` (`idcategory_user`, `type`) VALUES
(0, 'admin'),
(1, 'user');

INSERT INTO `user` (`id_user`, `name`, `nickname`, `email`, `gender`, `password`, `user_id_category_user`, `user_id_class_user`) VALUES
(0, 'admin', 'admin', 'admin@email.com', 'm', 'admin', 0, 10),
(1, 'user1', 'user1', 'user1@email.com', 'm', 'user1', 1, 0),
(2, 'User2', 'User2', 'user2@email.com', 'f', 'user2', 1, 0),
(3, 'User3', 'User3', 'user3@email.com', 'm', 'user3', 1, 0),
(4, 'User4', 'User4', 'user4@email.com', 'f', 'user4', 1, 0),
(5, 'User5', 'User5', 'user5@email.com', 'm', 'user5', 1, 0),
(6, 'User6', 'User6', 'user6@email.com', 'f', 'user6', 1, 0),
(7, 'User7', 'User7', 'user7@email.com', 'm', 'user7', 1, 0),
(8, 'User8', 'User8', 'user8@email.com', 'f', 'user8', 1, 0),
(9, 'User9', 'User9', 'user9@email.com', 'm', 'user9', 1, 0),
(10, 'User10', 'User10', 'user10@email.com', 'f', 'user10', 1, 0),
(11, 'Marco Andre Ubuntu', 'Marcubuntu', 'marco@ubuntu.com', 'M', 'ubuntu', 1, 0),
(12, '', '', '', '', '', 1, 0),
(13, 'Usuario leigo', 'Usuario_leigo', 'Usuario_leigo@email.com', 'm', 'senha', 1, 0);


INSERT INTO `post` (`id_post`, `date`, `content`, `status`, `post_id_category_post`, `post_id_user`) VALUES
(1, '2015-11-29 00:00:00', 'Como eu faço quests?', '0', 1, 1),
(2, '2015-11-21 00:00:00', 'Este site é novo', '0', 1, 6),
(3, '2015-10-12 00:00:00', 'Gostaram do site?', '0', 1, 9),
(4, '2015-04-01 00:00:00', 'Estou com problemas de não saber como ligar o mouse USB', '1', 2, 1),
(5, '2015-11-30 13:00:27', 'Por que os computadores da escola esquentam tanto?', '0', 1, 0),
(6, '2015-11-30 13:01:31', 'Por que os computadores da escola esquentam tanto?', '0', 3, 0),
(7, '2015-11-30 13:02:54', 'oxi gente', '0', 3, 0),
(8, '2015-11-30 13:03:28', 'Vou passar na bamca?', '0', 3, 0),
(9, '2015-11-30 14:43:34', 'Estou com duvidas em informatica', '0', 2, 0),
(10, '2015-12-02 13:24:41', 'Quais as equações que o processador calcula?', '0', 3, 1),
-- (11, '2015-12-03 08:52:24', 'Quais as equações que o processador calcula?', '0', 3, 1),
-- (12, '2015-12-03 08:53:26', 'Quais as equações que o processador calcula?', '0', 1, 1),
-- (13, '2015-12-03 08:53:36', 'Vou passar na bamca?', '0', 1, 1),
-- (14, '2015-12-03 10:41:46', 'Oxi porra', '0', 1, 1),
(14, '2015-12-03 10:41:58', '-aÃ£-dia', '0', 1, 1);


INSERT INTO `comment` (`id_comment`, `content`, `status`, `comment_id_user`, `comment_id_post`) VALUES
(1, 'Isso realmente é dúvidoso', '0', 2, 1),
(2, 'Como que anta têm dúvida, se o mesmo criou uma quest?', '0', 3, 1),
(3, 'Hue hue hue hue', '1', 4, 1),
(4, 'Preparado para ter um post deletado?', '0', 0, 1),
(5, 'a', '0', 1, 1),
(6, 'SOu zueiro', '0', 1, 1),
(7, 'mandando', '0', 1, 1),
(8, 'qualquer coisa aee...', '0', 1, 1),
(9, 'bla bla bla...', '0', 1, 2),
(10, 'Enviar quest 3', '0', 1, 3),
(11, 'Olá', '0', 1, 3),
(12, 'Oxi', '0', 1, 3),
(13, 'ola, ser user3', '0', 1, 3),
(14, 'escrever', '0', 1, 3),
(15, 'Vou banir todos', '0', 0, 3),
(16, 'olá, vaxio....', '0', 0, 4),
(17, 'O que importa é que tenha ubuntu\r\n', '0', 11, 1),
(18, 'sou dono disso', '0', 1, 2),
(19, 'kd o admin?', '0', 1, 2),
(20, 'puts', '0', 1, 2),
(21, 'bugou\r\n', '0', 1, 2),
(22, 'lallala\r\n', '0', 1, 2),
(23, 'thiago seu chato\r\n', '0', 1, 1),
(24, 'Post desnecssario pessoas', '0', 13, 2);

INSERT INTO `denouncement` (`id_denouncement`, `content`, `denouncement_id_post`, `denouncement_id_comment`, `denouncement_id_tutorial`, `denouncement_id_user`) VALUES
(1, 'ju', 1, NULL, NULL, 0),
(2, 'ju', 1, NULL, NULL, 0),
(3, 'Vou passar na bamca?', 2, NULL, NULL, 0),
(4, 'Vou passar na bamca?', NULL, 1, NULL, 0),
(5, 'Post desnecessário', 1, NULL, NULL, 13);



INSERT INTO `category_post` (`idcategory_post`, `category`) VALUES
(1, 'Dúvidas do site'),
(2, 'Dúvidas simples'),
(3, 'Dúvidas Complexas');

INSERT INTO `class_user` (`id_class_user`, `class`, `level`, `score`) VALUES
(0, 'pedra', 0, 0),
(1, 'Lapis-lazuli', 1, 1000),
(2, 'jade', 2, 2000),
(10, 'diamante', 10, 10000);
