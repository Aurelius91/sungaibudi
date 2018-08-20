<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patch_location extends CI_Controller
{
	private $_setting;

	public function __construct()
	{
		parent:: __construct();

		$this->_setting = $this->setting_model->load();
	}




	public function index()
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			$all_location = '[{"name":"Prostbeer","icon":"888d9e38e41365c6b2de5c45ecff9e38.jpg","content":"","latitude":"-8.675380","longitude":"115.183053"},{"name":"FARMER CITRA GARDEN VI","icon":null,"content":"","latitude":"-6.126201","longitude":"106.712885"},{"name":"LOTTEMART TAMAN SURYA","icon":null,"content":"","latitude":"-6.131530","longitude":"106.704709"},{"name":"CARREFOUR EXPRESS MERUYA","icon":null,"content":"","latitude":"-6.196288","longitude":"106.738709"},{"name":"CARREFOUR PURI INDAH","icon":null,"content":"","latitude":"-6.187819","longitude":"106.734202"},{"name":"CARREFOUR TAMAN PALEM","icon":null,"content":"","latitude":"-6.139479","longitude":"106.731617"},{"name":"HARI-HARI D.H.I.","icon":null,"content":"","latitude":"-6.139479","longitude":"106.731617"},{"name":"HARI-HARI KALIDERES","icon":null,"content":"","latitude":"-6.138345","longitude":"106.775171"},{"name":"HARI-HARI LOKASARI","icon":null,"content":"","latitude":"-6.146519","longitude":"106.823741"},{"name":"GIANT APARTEMEN MEDITERANIA","icon":null,"content":"","latitude":"-6.174145","longitude":"106.788305"},{"name":"GIANT CITRA GARDEN 2","icon":null,"content":"","latitude":"-6.144036","longitude":"106.706448"},{"name":"GIANT SPM SLIPI JAYA","icon":null,"content":"","latitude":"-6.188818","longitude":"106.796492"},{"name":"HERO TAMAN ANGGREK","icon":null,"content":"","latitude":"-6.178729","longitude":"106.792750"},{"name":"HYPERMART DAAN MOGOT","icon":null,"content":"","latitude":"-6.213697","longitude":"106.829115"},{"name":"RANCH ST.MORITZ","icon":null,"content":"","latitude":"-6.188413","longitude":"106.756216"},{"name":"HYPERMART PURI INDAH","icon":null,"content":"","latitude":"-6.185621","longitude":"106.739785"},{"name":"CARREFOUR CENTRAL PARK","icon":null,"content":"","latitude":"-6.177051","longitude":"106.790527"},{"name":"FOOD HALL KEBON JERUK","icon":null,"content":"","latitude":"-6.190982","longitude":"106.758035"},{"name":"CARREFOUR SEASON CITY","icon":null,"content":"","latitude":"-6.153459","longitude":"106.796224"},{"name":"HERO PURI INDAH MALL","icon":null,"content":"","latitude":"-6.188097","longitude":"106.733975"},{"name":"HERO CITRALAND","icon":null,"content":"","latitude":"-6.167759","longitude":"106.786286"},{"name":"RAMAYANA PALMERAH","icon":null,"content":"","latitude":"-6.163013","longitude":"106.833534"},{"name":"RAMAYANA CENGKARENG","icon":null,"content":"","latitude":"-6.153014","longitude":"106.728209"},{"name":"RANCH PESANGGRAHAN","icon":null,"content":"","latitude":"-6.188137","longitude":"106.756194"},{"name":"CARREFOUR EXPRESS","icon":null,"content":"","latitude":"-6.189775","longitude":"106.840648"},{"name":"CARREFOUR CEMPAKA MAS","icon":null,"content":"","latitude":"-6.163426","longitude":"106.876909"},{"name":"CARREFOUR CEMPAKA PUTIH","icon":null,"content":"","latitude":"-6.168571","longitude":"106.876964"},{"name":"CARREFOUR DUTA MERLIN","icon":null,"content":"","latitude":"-6.165073","longitude":"106.819683"},{"name":"HARI-HARI ROXY MAS","icon":null,"content":"","latitude":"-6.166866","longitude":"106.803368"},{"name":"HERO COKRO","icon":null,"content":"","latitude":"-6.197794","longitude":"106.828240"},{"name":"GIANT SPM GUNUNG SAHARI","icon":null,"content":"","latitude":"-6.150283","longitude":"106.835313"},{"name":"HERO MENTENG","icon":null,"content":"","latitude":"-6.187328","longitude":"106.822620"},{"name":"GIANT MENTENG HUIS","icon":null,"content":"","latitude":"-6.187730","longitude":"106.836425"},{"name":"HERO PLAZA SENAYAN","icon":null,"content":"","latitude":"-6.225326","longitude":"106.799139"},{"name":"HERO SARINAH THAMRIN","icon":null,"content":"","latitude":"-6.187749","longitude":"106.823656"},{"name":"HYPERMART GAJAH MADA","icon":null,"content":"","latitude":"-6.160706","longitude":"106.818589"},{"name":"FOOD HALL GRAND INDONESIA","icon":null,"content":"","latitude":"-6.195234","longitude":"106.819717"},{"name":"FOOD HALL THAMRIN","icon":null,"content":"","latitude":"-6.193467","longitude":"106.821440"},{"name":"YOGYA MANGGA DUA","icon":null,"content":"","latitude":"-6.137219","longitude":"106.823913"},{"name":"GIANT SPM APT.MED.KEMAYORAN","icon":null,"content":"","latitude":"-6.150326","longitude":"106.835313"},{"name":"RANCH MARKET GRAND INDONESIA","icon":null,"content":"","latitude":"-6.194895","longitude":"106.821407"},{"name":"LOTTEMART RATU PLAZA","icon":null,"content":"","latitude":"-6.226314","longitude":"106.801101"},{"name":"INDOGROSIR KEMAYORAN","icon":null,"content":"","latitude":"-6.156152","longitude":"106.850174"},{"name":"HERO EMERALD BINTARO","icon":null,"content":"","latitude":"-6.273122","longitude":"106.699305"},{"name":"FOOD HALL DAILY FX LIFE STYLE","icon":null,"content":"","latitude":"-6.224388","longitude":"106.803684"},{"name":"TRANS RETAIL KASABLANKA","icon":null,"content":"","latitude":"-6.224703","longitude":"106.839392"},{"name":"GIANT SPM FATMAWATI","icon":null,"content":"","latitude":"-6.300866","longitude":"106.795058"},{"name":"RAMAYANA KEBAYORAN","icon":null,"content":"","latitude":"-6.232747","longitude":"106.780023"},{"name":"JASON AMPERA","icon":null,"content":"","latitude":"-6.282380","longitude":"106.819577"},{"name":"JASON  SENOPATI","icon":null,"content":"","latitude":"-6.228713","longitude":"106.805785"},{"name":"RANCH MARKET LOTTE SHOPPING AVENUE","icon":null,"content":"","latitude":"-6.224162","longitude":"106.822962"},{"name":"LOTTEMART KEMANG","icon":null,"content":"","latitude":"-6.253683","longitude":"106.812902"},{"name":"FOOD HALL VILLA DELIMA","icon":null,"content":"","latitude":"-6.296926","longitude":"106.773607"},{"name":"CARREFOUR EXPRESS KEBAYORAN","icon":null,"content":"","latitude":"-6.238462","longitude":"106.765142"},{"name":"CARREFOUR EXPRESS PASAR MINGGU","icon":null,"content":"","latitude":"-6.267686","longitude":"106.844947"},{"name":"CARREFOUR AMBASSADOR","icon":null,"content":"","latitude":"-6.223761","longitude":"106.825760"},{"name":"CARREFOUR LAKESPRA","icon":null,"content":"","latitude":"-6.244684","longitude":"106.861900"},{"name":"CARREFOUR LEBAK BULUS","icon":null,"content":"","latitude":"-6.287654","longitude":"106.775865"},{"name":"CARREFOUR PERMATA HIJAU","icon":null,"content":"","latitude":"-6.221184","longitude":"106.783641"},{"name":"GELAEL MT.HARYONO","icon":null,"content":"","latitude":"-6.242900","longitude":"106.847174"},{"name":"GIANT KALIBATA MALL","icon":null,"content":"","latitude":"-6.257182","longitude":"106.856469"},{"name":"GIANT PLAZA SEMANGGI","icon":null,"content":"","latitude":"-6.219632","longitude":"106.814515"},{"name":"GIANT POINS SQUARE","icon":null,"content":"","latitude":"-6.289859","longitude":"106.777817"},{"name":"HARI-HARI FATMAWATI","icon":null,"content":"","latitude":"-6.264209","longitude":"106.797990"},{"name":"HERO BINTARO JAYA PLAZA","icon":null,"content":"","latitude":"-6.272656","longitude":"106.741968"},{"name":"GIANT SPM BINTARO","icon":null,"content":"","latitude":"-6.277818","longitude":"106.724383"},{"name":"GIANT SPM BINTARO JAYA","icon":null,"content":"","latitude":"-6.272277","longitude":"106.750502"},{"name":"GIANT BLOK M PLAZA","icon":null,"content":"","latitude":"-6.244413","longitude":"106.797592"},{"name":"GIANT CILANDAK KKO","icon":null,"content":"","latitude":"-6.302319","longitude":"106.815010"},{"name":"HERO GATOT SUBROTO","icon":null,"content":"","latitude":"-6.312018","longitude":"106.862359"},{"name":"GIANT SPM LEBAK BULUS","icon":null,"content":"","latitude":"-6.300001","longitude":"106.777942"},{"name":"GIANT SPM MAMPANG","icon":null,"content":"","latitude":"-6.242030","longitude":"106.825868"},{"name":"GIANT SPM MANGGARAI","icon":null,"content":"","latitude":"-6.209435","longitude":"106.847566"},{"name":"HERO PD.INDAH MALL","icon":null,"content":"","latitude":"-6.265642","longitude":"106.784899"},{"name":"HERO PONDOK INDAH TAROGONG","icon":null,"content":"","latitude":"-6.283013","longitude":"106.791594"},{"name":"HERO PERMATA HIJAU","icon":null,"content":"","latitude":"-6.221517","longitude":"106.788034"},{"name":"GIANT SPM TAMAN ALPHA","icon":null,"content":"","latitude":"-6.218584","longitude":"106.754529"},{"name":"RANCH MARKET DHARMAWANGSA","icon":null,"content":"","latitude":"-6.252728","longitude":"106.801902"},{"name":"RANCH MARKET PONDOK INDAH","icon":null,"content":"","latitude":"-6.262551","longitude":"106.784243"},{"name":"FOOD HALL PLAZA SENAYAN","icon":null,"content":"","latitude":"-6.221681","longitude":"106.798457"},{"name":"FOOD HALL PONDOK INDAH MALL","icon":null,"content":"","latitude":"-6.265640","longitude":"106.782392"},{"name":"FOOD HALL SENAYAN CITY","icon":null,"content":"","latitude":"-6.226791","longitude":"106.797423"},{"name":"TRANS RETAIL BLOK M","icon":null,"content":"","latitude":"-6.245735","longitude":"106.799861"},{"name":"HYPERMART PEJATEN","icon":null,"content":"","latitude":"-6.279043","longitude":"106.837215"},{"name":"RANCH MARKET KUNINGAN","icon":null,"content":"","latitude":"-6.227155","longitude":"106.825500"},{"name":"RANCH KEMANG","icon":null,"content":"","latitude":"-6.261727","longitude":"106.815860"},{"name":"HARI HARI BINTARO","icon":null,"content":"","latitude":"-6.277456","longitude":"106.723720"},{"name":"FARMER EPICENTRUM","icon":null,"content":"","latitude":"-6.216329","longitude":"106.835101"},{"name":"GIANT HPM BINTARO","icon":null,"content":"","latitude":"-6.277559","longitude":"106.720832"},{"name":"HERO KEMANG","icon":null,"content":"","latitude":"-6.264863","longitude":"106.820601"},{"name":"LOTTEMART GANDARIA","icon":null,"content":"","latitude":"-6.244704","longitude":"106.783546"},{"name":"FOOD HALL BELLEZZA","icon":null,"content":"","latitude":"-6.221917","longitude":"106.784288"},{"name":"RAMAYANA PS.MINGGU","icon":null,"content":"","latitude":"-6.282703","longitude":"106.840798"},{"name":"GIANT SPM GRAHA BINTARO","icon":null,"content":"","latitude":"-6.270830","longitude":"106.717198"},{"name":"FARMERS KALIBATA","icon":null,"content":"","latitude":"-6.256763","longitude":"106.851739"},{"name":"LOTTE MART BINTARO","icon":null,"content":"","latitude":"-6.274511","longitude":"106.724470"},{"name":"LOTTE MART-KUNINGAN","icon":null,"content":"","latitude":"-6.224359","longitude":"106.830254"},{"name":"HYPERMART KEMANG","icon":null,"content":"","latitude":"-6.260657","longitude":"106.812853"},{"name":"LOTTE MART-FATMAWATI","icon":null,"content":"","latitude":"-6.276444","longitude":"106.797294"},{"name":"GIANT CIPINANG","icon":null,"content":"","latitude":"-6.227021","longitude":"106.883165"},{"name":"INDOGROSIR CIPINANG","icon":null,"content":"","latitude":"-6.212402","longitude":"106.881620"},{"name":"GIANT SPM ARTOMORO","icon":null,"content":"","latitude":"-6.201365","longitude":"106.890308"},{"name":"RAMAYANA KLENDER","icon":null,"content":"","latitude":"-6.212796","longitude":"106.903038"},{"name":"RAMAYANA PULOGADUNG","icon":null,"content":"","latitude":"-6.203782","longitude":"106.977066"},{"name":"GIANT SPM GRAND ORCHARD","icon":null,"content":"","latitude":"-6.145680","longitude":"106.941616"},{"name":"CARREFOUR MEGA MALL PLUIT","icon":null,"content":"","latitude":"-6.113938","longitude":"106.790063"},{"name":"FARMERS MARKET BAY WALK MALL","icon":null,"content":"","latitude":"-6.107933","longitude":"106.779023"},{"name":"GIANT SPM AMANYAK PLUIT","icon":null,"content":"","latitude":"-6.118307","longitude":"106.794056"},{"name":"CARREFOUR EXPRESS  SUNTER","icon":null,"content":"","latitude":"-6.138522","longitude":"106.866005"},{"name":"CARREFOUR KELAPA GADING","icon":null,"content":"","latitude":"-6.147610","longitude":"106.889973"},{"name":"CARREFOUR MANGGA DUA SQUARE","icon":null,"content":"","latitude":"-6.138641","longitude":"106.831666"},{"name":"DIAMOND ARTHA GADING","icon":null,"content":"","latitude":"-6.214923","longitude":"106.872688"},{"name":"FARMERS KELAPA GADING","icon":null,"content":"","latitude":"-6.158066","longitude":"106.907405"},{"name":"GIANT SPM SUNTER","icon":null,"content":"","latitude":"-6.137772","longitude":"106.870904"},{"name":"HYPERMART KELAPA GADING","icon":null,"content":"","latitude":"-6.154637","longitude":"106.891784"},{"name":"FOOD HALL KELAPA GADING","icon":null,"content":"","latitude":"-6.141033","longitude":"106.833984"},{"name":"CARREFOUR CBD PLUIT","icon":null,"content":"","latitude":"-6.124626","longitude":"106.792336"},{"name":"GIANT SPM SUNTER MALL","icon":null,"content":"","latitude":"-6.139816","longitude":"106.859561"},{"name":"RAMAYANA TJ PRIOK","icon":null,"content":"","latitude":"-6.126301","longitude":"106.876792"},{"name":"RAMAYANA PS.KOJA","icon":null,"content":"","latitude":"-6.113565","longitude":"106.893788"},{"name":"LOTTEMART KELAPA GADING","icon":null,"content":"","latitude":"-6.155097","longitude":"106.896653"},{"name":"FARMERS BINTARO","icon":null,"content":"","latitude":"-6.285236","longitude":"106.727620"}]';

			$arr_location = json_decode($all_location);

			$location_record = array();
			$arr_batch_location_record = array();

			foreach ($arr_location as $location)
			{
				$location_record = array();

				$location_record['created'] = '2000-01-01 00:00:00';
				$location_record['updated'] = '2000-01-01 00:00:00';
				$location_record['author_id'] = 1;
				$location_record['author_name'] = 'Super Admin';

				$location_record['name'] = $location->name;
				$location_record['latitude'] = $location->latitude;
				$location_record['longitude'] = $location->longitude;
				$location_record['content'] = $location->content;

				$arr_batch_location_record[] = $location_record;
			}

			if (count($arr_batch_location_record) > 0)
			{
				$this->db->insert_batch('location', $arr_batch_location_record);
			}

			$this->db->trans_complete();
		}
		catch (Exception $e)
		{
			$json['message'] = $e->getMessage();
			$json['status'] = 'error';

			if ($json['message'] == '')
			{
				$json['message'] = 'Server error.';
			}
		}

		echo json_encode($json);
	}
}