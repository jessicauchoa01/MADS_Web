use goeat;

INSERT INTO `perfis` VALUES 
(1,'Administrador'),(2,'Cliente'),(3,'Restaurante');

INSERT INTO `moradas` VALUES 
(1,'Aquela Street','69','9500-147','Ponta Grossa','Portugal'),
(22,'rua','2','6234554','PDL','POR'),
(23,'rua','2','6234554','PDL','POR'),
(24,'rua','2','6234554','PDL','POR'),
(25,'rua','2','6234554','PDL','POR'),
(26,'Ali','69','9850-147','PDL','POR'),
(27,'Ali','69','9850-147','PDL','POR'),
(28,'Ali','69','9850-147','PDL','POR'),
(29,'Ali','69','9850-147','PDL','POR'),
(30,'Ali','69','9850-147','PDL','POR'),
(31,'Ali','69','9850-147','PDL','POR'),
(32,'Rua dos peixes ','10','9500-089','Ponta Delgada','Portugal'),
(33,'Rua da Linhaça','34','9500-010','Ponta Delgada','Portugal'),
(34,'Rua dos Bifes','14','9600-147','Ponta Delgada','Portugal'),
(35,'Rua das Enchiladas','26','9500-125','Ponta Delgada','Portugal'),(36,'Rua do cliente','20','9500-147','PDL','PT');

INSERT INTO `estados` VALUES 
(1,'Ativo'),(2,'Inativo'),(3,'Bloqueado'),(4,'Pendente');



INSERT INTO `utilizadores` VALUES 
(9,'Carlos','carlosnorte@gmail.com','$2y$10$rKRb.ZbSBdZOG/6VNmYgOuty4Bsbv89YZEtctmZiRZEhV2x7HTGBC',1,1,0),(13,'Pedro','pedro95@gmail.com','$2y$10$EjBSfoYSVZdhxfp2lcD4Geu1IGsKpsn5EXE1Z21debkDY8fzhg8Ki',1,1,0),
(15,'admin','admin@gmail.com','$2y$10$O8xZSfT8K3fMeAqwZX2RO.bvBRMbct/eUv66k40Gcts3H3uP4ljDa',1,1,0),(16,'pedro','cliente@gmail.com','$2y$10$AJ52nJo56GjGQDn7JWbX7uT0bmhOeGwYqR0oWWNo53UauEaTBSMs.',2,1,3),
(17,'Sushi','peixeearroz@sushi.com','$2y$10$AKD7B.N8aH/IUr70O7gEQOEqmH/MdeQvsisvGMEVFYOXzkJei8cdG',3,1,3),(18,'Jessica','jessica@linhaca.com','$2y$10$kBdMLL8DEACH.XAHKRYFAOOmXmAkpwx7D4MAWPO1sewUVOicoH2Dq',2,1,4),(20,'BIFEBOM','bifebom@gmail.com','$2y$10$eUedefqdaWHbMFSROd8VquUQzOUs70coi4zSxtPlTigocTirE6hDW',3,1,5),
(21,'ABAJOO','abajoo@mexico.com','$2y$10$mmpO/lyVKU9Yi6vtT.E/PeT.0QsT/KJvyKSKj5TE/X1Rb4eAM3diq',3,1,6),(22,'NomeAdmin','admin@admin.com','$2y$10$LL2Dlcdu8xGxAQpzp86W3ev5HTRkPSgXSXyCJmKVoRJcF68LBjAwG',1,1,0),
(23,'NomeCliente','cliente@cliente.com','$2y$10$uMIcmGoAMy3/0ZcOnT1qmujk6F02i1GCri7/r4MaRJX1qdRaKBOjS',2,1,5);




INSERT INTO `clientes` 
VALUES (1,'pedro','189524854','145214521',0,1),
(2,'pedro','189524854','145214521',0,1),
(3,'pedro','189524854','145214521',1,1),
(4,'Jessica','267890908','912224567',33,1),
(5,'NomeCliente','147523698','965874123',36,1);

INSERT INTO `situacoes` VALUES (1,'Submetida'),
(2,'Em Processamento'),
(3,'Por Levantar'),
(4,'Entregue'),
(5,'Cancelada');

INSERT INTO `tipos` VALUES (1,'Entrada'),
(2,'Sopa'),
(3,'Prato Peixe'),
(4,'Prato Carne'),
(5,'Vegetariano'),
(6,'Sobremesa'),
(7,'Bebida');

INSERT INTO `pratos` VALUES 
(4,'cha','cha',5.00,'assets/pratos/tranquili-tea.jpg',1,7,3),
(5,'Temaki','1unidade',7.00,'assets/pratos/sushiTemaki.webp',2,3,3),
(6,'Bife','Bife de vaca c/ batata e ovo',17.00,'assets/pratos/Bife.jpg',1,4,5),
(7,'Cerveja','Caneca em copo de cartao',2.00,'assets/pratos/cerveja.jpg',1,7,5),
(8,'Margarita','De Lima',4.00,'assets/pratos/margarita.jpg',1,7,6),
(9,'Enchilada','Carne Porco',14.00,'assets/pratos/enchilada.jpg',1,4,6),
(10,'Churro','C/ chocolate',5.00,'assets/pratos/churro.jpg',1,6,6),
(11,'tacos','4uni',8.00,'assets/pratos/tacos.jpg',1,4,6),
(12,'Queijo Fresco','c/ Pão',4.00,'assets/pratos/queijoFresco.jpg',1,1,5),
(13,'Pão Alho','para 2',4.00,'assets/pratos/pãoAlho.webp',1,1,5),
(14,'Canja','de Galinha',6.00,'assets/pratos/canja.jpg',1,2,5),
(15,'Caldo Verde','c/ chouriço',6.00,'assets/pratos/caldoVerde.jpg',1,2,5),
(16,'Combinado de Sushi','20peças',27.00,'assets/pratos/Combinado de Sushi.jpeg',1,3,3),
(17,'Gambas Fritas','gostoso',6.00,'assets/pratos/gambas fritas.jpg',1,1,3),
(18,'hostias de camarao','boas',4.00,'assets/pratos/hostia_camarao.png',1,1,3),
(19,'Sopa Miso','com cebolinho',6.00,'assets/pratos/sopaMiso.webp',1,2,3);

INSERT INTO `encomendas` VALUES (1,'Tue Jun 06, 2023 13:43',3,46),
(2,'Tue Jun 06, 2023 14:03',3,46),
(3,'Tue Jun 06, 2023 14:05',3,46),
(4,'Tue Jun 06, 2023 14:10',3,46),
(5,'Thu Jun 08, 2023 14:16',3,57),
(6,'Thu Jun 08, 2023 14:47',3,115),
(7,'Tue Jun 13, 2023 19:31',3,38),
(8,'Sun Nov 05, 2023 22:22',5,38);

INSERT INTO `encomenda_prato` VALUES 
(1,4,9,1,2),(2,4,10,1,5),(3,4,16,1,1),
(4,5,11,2,1),(5,5,9,2,1),(6,5,8,2,1),
(7,5,10,1,1),(8,6,16,3,1),(9,6,17,3,1),
(10,6,5,1,5),(11,6,4,1,4),(12,6,18,1,1),
(13,7,19,1,1),(14,7,4,1,1),(15,7,16,1,4),
(16,8,4,1,1),(17,8,16,1,1),(18,8,17,1,1);


INSERT INTO `restaurantes` VALUES 
(1,'Restaurante 1','147852369','147852369',31,4,'147852369','restaurantesbonzinhos, lda','12:30:00','23:00:00','www.uedjej.com','Eduardo ','147852369',0,1,0,1,1,1,1,0,0,1,1),
(2,'Restaurante B','147852369','963258741',1,4,'963528741','Restaurantes192,LDA','09:00:00','20:00:00','www.restaurante.com','Jeremias','932586471',1,1,1,1,1,1,0,1,0,0,1),
(3,'Sushi','123456789','914445566',32,1,'296653906','Peixe e arroz, LDA','12:30:00','23:00:00','www.sushicomarrozepeixe.com','Pedrim','913334466',0,1,1,1,1,1,1,1,0,1,1),
(5,'BIFEBOM','147852369','963258741',34,1,'963258741','bifes e Bitoques, Lda','12:00:00','00:00:00','www.bifebom.com','Lourenço','963854712',0,0,1,1,1,1,0,1,0,1,1),
(6,'ABAJOO','147852639','965874123',35,1,'965874123','comidamexicana,lda','12:00:00','00:00:00','www.abajoo.com','Maria Taquito','965874123',0,1,1,1,1,1,1,1,0,1,1);