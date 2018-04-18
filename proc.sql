CREATE PROCEDURE sp_usuarios_insert (
	@login VARCHAR(64),
	@senha VARCHAR(256)
)

AS

INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (@login, @senha);
SELECT SCOPE_IDENTITY();
---------------------------------------------------------------------------

ALTER PROCEDURE sp_usuarios_insert (
	@login VARCHAR(64),
	@senha VARCHAR(256)
)

AS

INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (@login, @senha);
SELECT * FROM tb_usuarios WHERE idusuario = @@IDENTITY;

---------------------------------------------------------------------------

ALTER PROCEDURE sp_usuarios_insert (
	@login VARCHAR(64),
	@senha VARCHAR(256)
)

AS

INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (@login, @senha);
SELECT * FROM tb_usuarios WHERE idusuario = @login AND dessenha = @senha;