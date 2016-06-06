CREATE DATABASE bd_nutricao;
USE bd_nutricao;

CREATE TABLE tb_alimento(
	id_alimento		int		not null,
	tx_alimento		varchar(100)    not null,
	id_medida		int		not null,
	nf_energia		float		not null,
	nf_lipidios		float		not null,
	nf_ag_saturados         float		not null,
	nf_sodio		float		not null,
	nf_calcio		float		not null,
	nf_ferro		float		not null,
	constraint pk_tb_alimento primary key (id_alimento)
)engine=innodb;


CREATE TABLE tb_medida_caseira(
	id_medida		int		not null,
	tx_medida		varchar(100)	not null,
	constraint pk_tb_medida_caseira primary key (id_medida)
)engine=innodb;

ALTER TABLE tb_alimento
	add constraint fk_tb_alimento_ref_tb_medida_caseira foreign key (id_medida)
	references tb_medida_caseira (id_medida)
	on delete restrict on update restrict;
