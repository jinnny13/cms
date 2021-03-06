<?
class Delivery extends Model
{
    static $table='delivery';
    static $name='Способ доставки';
	
	public function __construct($registry)
    {
        parent::getInstance($registry);
    }

    //для доступа к классу через статичекий метод
	public static function getObject($registry)
	{
		return new self::$table($registry);
	}

    public function add()
    {
        $message='';
        if(isset($_POST['name']))
        {
            $id = $this->db->insert_id("INSERT INTO `".$this->table."` SET active=?", array($_POST['active']));

            $languages = $this->db->rows("SELECT * FROM language");
            foreach($languages as $lang)
            {
                $tb=$lang['language']."_".$this->table;
                $this->db->query("INSERT INTO `$tb` SET `name`=?, `delivery_id`=?", array($_POST['name'], $id));
            }
            $message.= messageAdmin('Данные успешно добавлены');
        }
        //else $message.= messageAdmin('При добавление произошли ошибки', 'error');
        return $message;
    }

    public function save()
    {
        $message='';
        if(isset($this->registry['access']))$message = $this->registry['access'];
        else
        {
            if(isset($_POST['save_id'])&&is_array($_POST['save_id']))
            {
                if(isset($_POST['save_id'], $_POST['name']))
                {
                    for($i=0; $i<=count($_POST['save_id']) - 1; $i++)
                    {
                        //$this->db->query("UPDATE `".$this->table."` SET price=? WHERE id=?", array($_POST['price'][$i], $_POST['save_id'][$i]));
                        $this->db->query("UPDATE `".$this->registry['key_lang_admin']."_".$this->table."` SET `name`=? WHERE delivery_id=?", array($_POST['name'][$i], $_POST['save_id'][$i]));
                    }
                    $message .= messageAdmin('Данные успешно сохранены');
                    if(isset($_POST['base']))$this->db->query("UPDATE `".$this->table."` SET base=? WHERE id=?", array(1, $_POST['base']));
                }
                else $message .= messageAdmin('При сохранение произошли ошибки', 'error');
            }
        }
        return $message;
    }
}
?>