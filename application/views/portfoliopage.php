<?php
/**
 * @var $tag string
 */
class Production {

	/**
	 * 識別ID
	 * @var int
	 */
	public $id;

	/**
	 * コンテンツ、サービスの名前
	 * @var string
	 */
	public $name;

	/**
	 * 一行に収まる簡単な説明
	 * @var string
	 */
	public $light_detail;

	/**
	 * 制作物の種類
	 * PRO_TYPE_***
	 * @var string
	 */
	public $type;

	/**
	 * 詳細な説明文
	 * @var string
	 */
	public $detail;

	/**
	 * 画像のURL
	 * @var string
	 */
	public $img_src;

	/**
	 * 使った技術のリスト
	 * @var string[]
	 */
	public $tech_list;

	/**
	 * 製作時期
	 * @var string
	 */
	public $date;

	/**
	 * リンクがある場合はリンク
	 * @var string
	 */
	public $link;

	/**
	 * リンクがある場合はリンク
	 * @var string[]
	 */
	public $members;
	private static $id_stamp;

	/**
	 * 
	 * @param string $name
	 * @param string $light_detail
	 * @param string $detail
	 * @param string[] $tech_list
	 * @param string $date
	 * @param string $img_src
	 * @param string $link
	 * @param string $members
	 * memberName => comment
	 */
	public function __construct($name, $light_detail, $type, $detail, $tech_list, $date, $img_src = NULL, $link = NULL, array $members = array()) {
		$this->id = Production::$id_stamp++;
		$this->name = $name;
		$this->light_detail = $light_detail;
		$this->type = $type;
		$this->detail = $detail;
		$this->img_src = $img_src;
		$this->link = $link;
		$this->tech_list = $tech_list;
		$this->date = $date;
		$this->members = $members;
	}

	public function get_icon_url() {
		return str_replace('sc_', 'sm_', $this->img_src);
	}

}

function convert_to_css_class($str) {
	return strtolower(str_replace(array('.', '+', ' ', '形態素解析'), array('-', 'p', '_', ''), $str));
}

$production_list = array(
	new Production(
		'3Dオセロ', 'XYZ3次元に石を置けるオセロ', PRO_TYPE_SOFTWARE, <<<EOF
		可視化をテーマに初めて作った3Dゲーム
EOF
		, array(TECHTAG_CPP, TECHTAG_DXLIB, TECHTAG_WINDOWS, TECHTAG_VISUALSTUDIO), '2011年8月', PATH_IMG_PRO_OTHELLO
	),
	new Production(
		'タンクゲーム', '2Pシューティングアクションゲーム', PRO_TYPE_SOFTWARE, <<<EOF
		ボンバーマン風ステージでシューティングするアクションゲーム.同じキーボードで2P対戦ができる.様々な武器アイテムが用意した
EOF
		, array(TECHTAG_CPP, TECHTAG_DXLIB, TECHTAG_WINDOWS, TECHTAG_VISUALSTUDIO), '2012年8月', PATH_IMG_PRO_TANK, NULL, array('Lamia_inase' => 'ステージ上のドット絵全般', 'karura820' => 'サウンド全般')
	),
	new Production(
		'電大トレンド君', 'TwitterTDUクラスタのトレンドワードbot', PRO_TYPE_BOT, <<<EOF
		TDUクラスタのリストのTLからトレンドワードを解析して1時間に一度配信する.hotなワードを決めるアルゴリズムを徐々に強化した.おまけ機能なんかもつけてTwitterAPIの勉強になった
EOF
		, array(TECHTAG_PHP, TECHTAG_GOOGLESCRIPT, TECHTAG_TWITTERAPI, TECHTAG_YAHOOAPI, TECHTAG_WINDOWS, TECHTAG_ECLIPSE), '2013年3月', PATH_IMG_PRO_TREND, '//twitter.com/TDU_Trend'
	),
	new Production(
		'IconStage', 'Twitterアイコン上でシューティングゲーム', PRO_TYPE_SERIVICE, <<<EOF
		Twitterと連携してフレンドなどのTwitterアイコンからステージを生成して,敵を倒すシューティングゲーム.非同期にProcessing.jsのcanvasに情報を送るところや,ステージを生成するアルゴリズムや敵のAPIのゲームバランスで苦労した
EOF
		, array(TECHTAG_PHP, TECHTAG_JS, TECHTAG_PROCESSING, TECHTAG_PROCESSING_JS, TECHTAG_JQUERY, TECHTAG_TWITTERAPI, TECHTAG_TWITTERWEBAPI, TECHTAG_WINDOWS, TECHTAG_ECLIPSE), '2013年3月', PATH_IMG_PRO_ICONSTAGE, '//iconstages.elzup.com/'
	),
	new Production(
		'Jenga Note', '大学の講義を掲示板風にオンラインでまとめて共有サイト', PRO_TYPE_SERIVICE, <<<EOF
		授業についてのメモを講義ごとのページで共有できるサービス.その時間に行われてる講義をわかりやすくしたり,メモが整理できるように特化した掲示板にした,Bootstrapを初めて使った.現在停止中
EOF
		, array(TECHTAG_PHP, TECHTAG_JQUERY, TECHTAG_LESS, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_MYSQL, TECHTAG_ECLIPSE, TECHTAG_VIM), '2013年11月', PATH_IMG_PRO_JENGA /* PATH_IMG_PRO_JENGA */, '//elzzup.yuta-ri.net/fillup/'
	),
	new Production(
		'一夜人狼', '端末一台でワンナイト人狼をできるWebアプリ', PRO_TYPE_SERIVICE, <<<EOF
		オーナー役無しで一つのスマホを回しあってゲームできるように作った.CGIは使わずJQueryやBootstrapを中心に作った.当時人狼にはまっていて,スマホで使えるようにレスポンシブデザインに凝った.
EOF
		, array(TECHTAG_JS, TECHTAG_LESS, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_ECLIPSE, TECHTAG_VIM), '2013年12月', PATH_IMG_PRO_ICHIYA, '//elzzup.yuta-ri.net/wolf/'
	),
	new Production(
		'時みくじ', '小さなおみくじサイト', PRO_TYPE_NETA, <<<EOF
		年明けに遊びで作ったおみくじ.BootstrapとJavascriptとLESSの練習がメイン.自分ではいいデザインだと思ってるサイトの一つ
EOF
		, array(TECHTAG_PHP, TECHTAG_JS, TECHTAG_LESS, TECHTAG_JQUERY, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_ECLIPSE), '2014年1月', PATH_IMG_PRO_TOKIMIKUJI, '//app.elzup.com/tk'
	),
	new Production(
		'RollCakeRSS', 'Feed登録や管理ができるソフト', PRO_TYPE_SOFTWARE, <<<EOF
		JavaSwingで作ったWindowアプリ,Feed登録やソートなど基本操作やグループ化管理,正規表現でItemから指定した要素を取ってきて表示などの機能.人に見せられるようなものではない
EOF
		, array(TECHTAG_JAVA, TECHTAG_WINDOWS, TECHTAG_ECLIPSE, TECHTAG_VIM), '2014年1月', PATH_IMG_PRO_ROLLCAKE, '//github.com/elzzup/RollCake_RSS'
	),
	new Production(
		'投票メーカー', '投票を手軽に作成できるWebサービス', PRO_TYPE_SERIVICE, <<<EOF
		ドメインも取得して本格的なサービスとして作成した.初めてCodeIgniterフレームワークを使用して作成したサイト.アカウント管理やシェアの部分でTwitterと連携している.SEOも意識している(つもり)
EOF
		, array(TECHTAG_PHP, TECHTAG_JQUERY, TECHTAG_LESS, TECHTAG_TWITTERAPI, TECHTAG_TWITTERWEBAPI, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_LINUX, TECHTAG_MYSQL, TECHTAG_GIT), '2014年4月', PATH_IMG_PRO_TOHYO, '//tohyomaker.com'
	),
	new Production(
		'asn_web', '学生団体ASNのホームページ', PRO_TYPE_SERIVICE, <<<EOF
		大学のつながりで依頼されて作ったサイト
EOF
		, array(TECHTAG_PHP, TECHTAG_LESS, TECHTAG_JQUERY, TECHTAG_BOOTSTRAP, TECHTAG_CODEIGNITER, TECHTAG_USTREAMAPI, TECHTAG_LINUX, TECHTAG_WINDOWS, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT), '2014年7月', PATH_IMG_PRO_ASN, '//asn-web.com'
	),
	new Production(
		'TDUClaud', '講義ごとにTweetまとめサイト', PRO_TYPE_SERIVICE, <<<EOF
		講義毎に決められたハッシュタグで投稿されたツイートをサイト側でラベル付やお気に入り登録して管理ができるサービス,Twitterアカウントでログイン制でラベル情報は全ユーザで共有される.
		5人グループで内部設計,仕様書作成から行った,gitを使ったグループ開発のいい経験になった
EOF
		, array(TECHTAG_JAVA, TECHTAG_TWITTERAPI, TECHTAG_JAVASERVLET, TECHTAG_JQUERY, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_LINUX, TECHTAG_ECLIPSE, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT), '2013年6月', PATH_IMG_PRO_CLAUD, NULL, array('sukonbu0909' => 'プロジェクトマネージャ', 'twinkfrag' => 'アプリケーションスペシャリスト', 'godslew' => 'ITアーキテクト', 'arzzup' => 'ITアーキテクト', 'munisystem' => '品質保証マネージャ')
	),
	new Production(
		'酔っ払った―', '酔っ払ったツイートができる簡易Webアプリ', PRO_TYPE_NETA, <<<EOF
		フォームに入力したテキストを酔っ払った感じでツイートできる.酔っ払い具合の調節が可能.開発期間1日
EOF
		, array(TECHTAG_PHP, TECHTAG_LESS, TECHTAG_YAHOOAPI, TECHTAG_TWITTERAPI, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_LINUX, TECHTAG_NETBEANS, TECHTAG_VIM), '2014年6月', PATH_IMG_PRO_YOPPARATTER, '//app.elzup.com/yopparatter/'
	),
	new Production(
		'BirthdayAPI', '作品のキャラクター誕生日API', PRO_TYPE_API, <<<EOF
		作品タイトル,キャラクター,日付,自分の見た作品などから指定してリクエストするとその結果が帰ってくる,GETしか作っていない,ユーザごとに作品の管理ができるが今のところ半手動
EOF
		, array(TECHTAG_PHP, TECHTAG_LINUX, TECHTAG_MYSQL, TECHTAG_POSTGRESQL, TECHTAG_VIM, TECHTAG_GIT), '2014年7月', PATH_IMG_PRO_BIRTHDAY, '//github.com/elzzup/CharactorBirthdayAPI'
	),
	new Production(
		'念写ったー', 'Twitterアイコンを全角文字AA化', PRO_TYPE_NETA, <<<EOF
		100文字でつぶやければ流行ると思ったが10×10の解像度じゃ限界があるのが誤算だった.Processing側で全角漢字や記号について2*2分割のマップでサンプル化してPHPでアイコン画像を解析して生成している.PHPのGDに初めて触れた
EOF
		, array(TECHTAG_PHP, TECHTAG_JAVA, TECHTAG_PROCESSING, TECHTAG_BOOTSTRAP, TECHTAG_CODEIGNITER, TECHTAG_TWITTERAPI, TECHTAG_LINUX, TECHTAG_NETBEANS, TECHTAG_INTELLIJIDEA, TECHTAG_VIM, TECHTAG_GIT), '2014年8月', PATH_IMG_PRO_NENSYATTER, '//app.elzup.com/nn'
	),
	new Production(
		'<strong>elzup.com</strong>', 'このホームページ', PRO_TYPE_SERIVICE, <<<EOF
		Bootstrapは使わずに,できるだけライブラリに頼らないように作った.これからも進化を続けていく
EOF
		, array(TECHTAG_PHP, TECHTAG_CODEIGNITER, TECHTAG_JQUERY, TECHTAG_LINUX, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT), '2014年8月', PATH_IMG_PRO_ELZUP
	),
	new Production(
		'言えるかな？', '言えるかなゲームで遊ぼう', PRO_TYPE_SERIVICE, <<<EOF
		言えるかなゲーム(山手線ゲーム)を作ったり遊んだりできるサイト	,seo対策やRSS配信ping送信などや非同期通信での登録フォームUIなど力を入れた
EOF
		, array(TECHTAG_PHP, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_JQUERY, TECHTAG_COFFEESCRIPT, TECHTAG_LINUX, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT, TECHTAG_GRUNT), '2014年8月', PATH_IMG_PRO_IERUKANA, '//ierukana.elzup.com'
	),
	new Production(
		'TDU12FI研究室希望bot', '研究室希望登録があるたびに通知', PRO_TYPE_BOT, <<<EOF
		14年度研究室配属希望があるとその研究室の志望者人数と定員数をツイートするTwitterBot.3時間ぐらいで作った
EOF
		, array(TECHTAG_PHP, TECHTAG_TWITTERAPI, TECHTAG_LINUX, TECHTAG_VIM), '2014年9月', PATH_IMG_PRO_LABOATTEND, '//twitter.com/tdu12fi'
	),
	new Production(
		'どうぶつしょうぎ解析', 'どうぶつしょうぎ棋譜評価ソフト', PRO_TYPE_SOFTWARE, <<<EOF
		どうぶつしょうぎの上級者の棋譜を収集して評価値を作った.
EOF
		, array(TECHTAG_PHP, TECHTAG_LESS, TECHTAG_JQUERY, TECHTAG_COFFEESCRIPT, TECHTAG_LINUX, TECHTAG_GIT, TECHTAG_MYSQL, TECHTAG_VIM), '2014年9月', PATH_IMG_PRO_DSHOGI, '//dshogi.elzup.com'
	),
);
http://twitter.com/tdu12fi
// 種類分け
$production_kinds = array();
foreach ($production_list as $pro) {
	$production_kinds[$pro->type][] = $pro;
}

// タグの説明定義
$tag_helps = array();
$tag_helps[] = array('Language', 'プログラミング言語');
$tag_helps[] = array('MetaLang', 'メタ言語など');
$tag_helps[] = array('Framework', 'フレームワークなど');
$tag_helps[] = array('Lib', '主要ライブラリ');
$tag_helps[] = array('API', 'API');
$tag_helps[] = array('Service', 'その他サービス');
$tag_helps[] = array('OS', '作業PCのOS');
$tag_helps[] = array('DB', 'データベース');
$tag_helps[] = array('Editor', 'IDEやエディタ');
$tag_helps[] = array('Admin', 'プロジェクト管理システム');
?>

<div class="content">
	<h1 class="content-title">ポートフォリオ of elzup</h1>
	<p class="page-discription">今までに作ったもの</p>
	<?php if (!!$tag) { ?>
		<p ><a href="<?= base_url(PATH_PORT) ?>">タグ解除</a></p>
	<?php } ?>
	<div class="content-body">
		<div class="production-pagelinks">
			<?php foreach ($production_kinds as $type => $pl) { ?>
				<div class="pro-group">
					<span class="sub-title"><?= $type ?></span>
					<ul>
						<?php
						foreach ($pl as $i => $p) {
							if ($tag && !in_array($tag, $p->tech_list)) {
								continue;
							}
							?>
							<li>
								<div class="btn-jump" for="#pi<?= $p->id ?>">
									<div class="icon icon-<?= "" + $p->id ?>"></div>
									<span class="name"><?= $p->name ?></span>
								</div>
							</li>
							<?php
						}
						if ($i < 2) {
							?>
							<li>
								<div>
									<div class="icon"></div>
									<span class="name"></span>
								</div>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
			<?php } ?>
		</div>
		<div class="production-box">
			<?php
			$c = 0;
			foreach ($production_list as $i => $p) {
				if ($tag && !in_array($tag, $p->tech_list)) {
					continue;
				}
				?>
				<div id="pi<?= $p->id ?>" class="production-item half">
					<div class="img-box">
						<a href="<?= $p->img_src ?>" rel="lightbox">
							<img class="sc" src="<?= $p->img_src ?>" alt="elzup.com <?= $p->name ?>" />
						</a>
					</div>
					<div class="detail-box">
						<a href="<?= $p->link ?>" class="<?= $p->link ? '' : 'disabled' ?>" target="_blank">
							<span class="name"><?= $p->name ?></span><span class="icon-jump"><?= $p->link ? '↗' : '' ?></span>
						</a>
						<p class="light-detail"><?= $p->light_detail ?></p>
						<p class="detail"><?= $p->detail ?></p>
					</div>
					<div class="members">
						<?php if ($mems = $p->members) { ?>
							<span class="tips">共同制作者</span>
							<?php foreach ($mems as $sn => $text) { ?>
								<p class="member">
									<a href="//twitter.com/<?= $sn ?>" target="_blank"><span class="member-name">@<?= $sn ?></span></a>
									<span class="text"><?= $text ?></span>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="tags">
						<?php foreach ($p->tech_list as $tech) { ?>
							<a href="<?= base_url(PATH_PORT . '?tag=' . $tech) ?>" class="techtag techtag-<?= convert_to_css_class($tech) ?>"><?= $tech ?></a>
						<?php } ?>
					</div>
				</div>
				<?php if ($c++ % 2 == 1) { ?>
					<br class="clearboth" />
				<?php } ?>
			<?php } ?>
		</div>
		<div class="help-panel">
			<h3 class="sub-title">タグColorについて</h3>
			<ul class="help-list">
				<?php foreach ($tag_helps as $help) { ?>
					<li>
						<span class="techtag techtag-<?= strtolower($help[0]) ?>"><?= $help[0] ?></span>
						<span class="description"><?= $help[1] ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<pre>
	<?php
	$constans = get_defined_constants(TRUE);
	$tags = array_flip(array_filter(@array_flip($constans['user']), function($str) {
			return strpos($str, 'TECHTAG') !== FALSE;
		}));
//var_dump($tags);
