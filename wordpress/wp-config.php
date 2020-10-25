<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp_pradig' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^}5uckjSM-}:hI64uCw@!uis+k[b&1<E4M@8$x,+8L%8ZYa&pv2Q>$B^.!~g!V`f' );
define( 'SECURE_AUTH_KEY',  'daI8b66#!Lw^[Ajn5U5x,ru(9p(QR5K;qsBz%/cB&v#Ae@p-1sENrC?C}otzAuxB' );
define( 'LOGGED_IN_KEY',    '8dLmK#aZ(4^vctiOVTb@jH=:9q{TVQC:@wF?1b/zk>J9peGE6{SHr`b}>VD{EO7~' );
define( 'NONCE_KEY',        '>x[[Vj<bVoM6?fAee72FY+^j~Xk(]6.0s rJC,?c]e2Sy9of16)!vGZGSi>%tPzW' );
define( 'AUTH_SALT',        'AI5(NT?kz~%`%7dj_5WAQquJ^8hnh#4wUI~:W48-CBUT3tsG(^kv+zDaj%a[(XYB' );
define( 'SECURE_AUTH_SALT', '>b#kA7O>b=H$5?iu?j^yzb<%AzAOjEu5]/ine83vFFgmqzr>r;pwVtwZ=0PrhStb' );
define( 'LOGGED_IN_SALT',   '8zGmJ$EKR+T&L39uNd$NG*+XcBG yb3iK#(}Glv>N@ TN1GOiVi$*]7xQlLgM`=_' );
define( 'NONCE_SALT',       'PH.0C[p~8J*~;;`mBAN!0HcjNZC2[@GJ]DGv/`[d_{wj2(@y %CGA+>Lkf:WALzA' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
