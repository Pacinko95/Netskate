<?php

    header('Access-Control-Allow-Origin: *');

    defined('BASEPATH') OR exit('No direct script access allowed');



    class Invoice_model extends CI_Model {

        private $_mongoDb;
        function __construct() {

            parent::__construct();

            $this->load->database();

        }

        public function insert($table, $data)
        {
            return $this->db->insert($table, $data);
        }

        public function select($id = null)
        {

            if($_SESSION['type'] == 2){

                $id = $_SESSION['id_club'];
                $sql = $this->db->join('tbl_status b','b.id = a.status','left')->join('tbl_event c','a.id_event= c.id','left')
                ->select("c.name as name_event , a.id_event , a.step, a.status as id_status, a.code_invoice, DATE_FORMAT(a.date_pay, '%d/%m/%Y %H:%m:%s') as create_date, b.name as status, a.status as id_status,  format( a.payment + a.code_payment, 0) as hasil, a.code_payment")->where('id_club', $id)->get('tbl_invoice a')->result();

            }elseif($_SESSION['type'] == 3){
                $id = $_SESSION['id_alete'];
                $sql = $this->db->join('tbl_status b','b.id = a.status','left')->select("a.code_invoice, DATE_FORMAT(a.create_date, '%d/%m/%Y') as create_date, b.name as status, a.status as id_status,  format( SUM(a.payment + a.code_payment), 0) as hasil, a.code_payment")->where('id_athlete', $id)->get('tbl_invoice a')->result();
            }
            // die($id);

            // return $this->db->join('tbl_status b','b.id = a.status','left')->select("a.code_invoice, DATE_FORMAT(a.create_date, '%d/%m/%Y') as create_date, b.name as status")->where('id_club', $id)->get('tbl_invoice a')->result();

            return $sql;
        }

        // public function detail($id_invoice = null)
        // {

        //     $query =  $this->db->query("
        //         SELECT
        //         distinct  b.name, b.sex, f.name as disname, d.name as gpname,
        //         concat('Rp ', format( price, 0)) as price, e.name as clname, a.bib,   DATE_FORMAT(b.dob, '%d/%m/%Y') as bod,
        //         h.name as mku, b.id as id_athlete, a.bib, price as l_list, CONCAT(i.`name`,' ',i.size_name) as tshirt
        //         from tbl_invoice_detail a
        //         LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
        //         LEFT JOIN tbl_race c ON a.id_race = c.id
        //         LEFT JOIN tbl_mku d on a.id_mku = d.id
        //         LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
        //         LEFT JOIN tbl_class e on b.idclass = e.id
        //         LEFT JOIN tbl_mku h on b.idclass = h.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN h.age_start AND h.age_end
        //         LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
        //         WHERE code_invoice='$id_invoice'
        //         ");

        //     return $query->result();

 
        // }

        // update
        // public function detail($id_invoice = null)
        // {

        //     $query =  $this->db->query("
        //     SELECT
        //     distinct b.id as id_athlete,  b.name, b.sex,  DATE_FORMAT(b.dob, '%d/%m/%Y') as bod, f.name as disname,
        //     concat('Rp ', format( e.price, 0)) as price,
        //      aa.name as clname, a.bib,
        //     d.name as mku,  CONCAT(i.`name`,' ',i.size_name) as tshirt
        //     from tbl_invoice_detail a
        //     LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
        //     LEFT JOIN tbl_race c ON a.id_race = c.id
        //     LEFT JOIN tbl_mku d on a.id_mku = d.id_mku   AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
        //     LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
        //     LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
        //     LEFT JOIN tbl_class aa ON b.idclass = aa.id
        //     LEFT JOIN tbl_invoice ab ON ab.code_invoice = a.code_invoice
        //      LEFT JOIN tbl_class_price e on b.idclass = e.id_class AND e.id_event = ab.id_event
        //     WHERE a.code_invoice='$id_invoice' ORDER BY a.bib ASC
        //         ");

        //     return $query->result();


        // }


        public function detail($id_invoice = null)
        {

            $query =  $this->db->query("
                                       SELECT
                                       distinct b.id as id_athlete,  b.name, b.sex,  DATE_FORMAT(b.dob, '%d/%m/%Y') as bod, f.name as disname,
                                       concat('Rp ', format( e.price, 0)) as price,
                                       aa.name as clname, a.bib,
                                       IF(d.name IS NULL ,
                                        (SELECT mm.name FROM tbl_invoice_detail m    LEFT JOIN tbl_mku mm ON m.id_mku = mm.id_mku   WHERE m.code_invoice='$id_invoice' AND m.id_athlete = b.id GROUP BY m.id_athlete)
                                        ,d.name) as mku,
                                       CONCAT(i.`name`,' ',i.size_name) as tshirt
                                       from tbl_invoice_detail a
                                       LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
                                       LEFT JOIN tbl_race c ON a.id_race = c.id
                                       LEFT JOIN tbl_mku d on a.id_mku = d.id_mku   AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
                                       LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
                                       LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
                                       LEFT JOIN tbl_class aa ON b.idclass = aa.id
                                       LEFT JOIN tbl_invoice ab ON ab.code_invoice = a.code_invoice
                                       LEFT JOIN tbl_class_price e on b.idclass = e.id_class AND e.id_event = ab.id_event
                                       WHERE a.code_invoice='$id_invoice' ORDER BY a.bib ASC
                                       ");

                                       return $query->result();


                                       }

                                       public function detail_eo($id_event = null)
                                       {

                                       $query =  $this->db->query("
                                                                  SELECT
                                                                  distinct  b.name,  UPPER(cl.name_club) as name_club ,b.sex, f.name as disname,
                                                                  IF(d.name IS NULL ,(SELECT bb.name FROM  tbl_mku bb  WHERE bb.id_event='$id_event' AND a.id_mku = bb.id_mku  GROUP BY bb.id_mku),d.name) as gpname,
                                                                  concat('Rp ', format( price, 0)) as price, e.name as clname, a.bib,   DATE_FORMAT(b.dob, '%d/%m/%Y') as bod,
                                                                  h.name as mku, b.id as id_athlete, a.bib, price as l_list
                                                                  from tbl_invoice_detail a
                                                                  LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
                                                                  LEFT JOIN tbl_race c ON a.id_race = c.id
                                                                  LEFT JOIN tbl_mku d on a.id_mku = d.id
                                                                  LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
                                                                  LEFT JOIN tbl_class e on b.idclass = e.id
                                                                  LEFT JOIN tbl_mku h on b.idclass = h.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN h.age_start AND h.age_end
                                                                  LEFT JOIN tbl_invoice k ON a.code_invoice = k.code_invoice
                                                                  LEFT JOIN tbl_club cl ON b.idclub = cl.id
                                                                  WHERE k.id_event='$id_event'  AND k.status ='4'  GROUP BY a.bib ORDER BY a.bib ASC
                                                                  ");

                                                                  return $query->result();


                                                                  }




                                                                  // public function detaile_price($id_invoice = null)
                                                                  // {
                                                                  //     return $this->db->query("SELECT  concat('Rp ', format( SUM(price), 0)) as pay,  d.status, d.img, format( SUM(price), 0) as jj, SUM(price) as hasil,
                                                                  //         code_payment as code_payments, concat('Rp ', format(  code_payment, 0)) as  code_payments_r , concat('Rp ', format(  SUM(price) + code_payment, 0)) as  code_payments_hasil
                                                                  //         FROM tbl_atlet a
                                                                  //         LEFT JOIN tbl_class b ON a.idclass = b.id
                                                                  //         LEFT JOIN tbl_invoice d ON  d.code_invoice ='$id_invoice'
                                                                  //         WHERE  a.id IN(SELECT id_athlete FROM tbl_invoice_detail where code_invoice='$id_invoice')
                                                                  //         ")->row();
                                                                  // }

                                                                  public function detaile_price($id_invoice = null)
                                                                  {
                                                                  return $this->db->query(" SELECT
                                                                                          concat('Rp ', format( SUM(price), 0)) as pay,
                                                                                          d.status, d.img, format( SUM(price), 0) as jj,
                                                                                          SUM(price) as hasil,
                                                                                          code_payment as code_payments,
                                                                                          concat('Rp ', format(  code_payment, 0)) as  code_payments_r ,
                                                                                          concat('Rp ', format(  SUM(price) + code_payment, 0)) as  code_payments_hasil
                                                                                          FROM tbl_atlet a
                                                                                          LEFT JOIN tbl_invoice d ON  d.code_invoice ='$id_invoice'
                                                                                          LEFT JOIN tbl_class_price b ON a.idclass = b.id_class AND b.id_event= d.id_event
                                                                                          WHERE  a.id IN(SELECT id_athlete FROM tbl_invoice_detail where code_invoice='$id_invoice')
                                                                                          ")->row();
                                                                                          }

                                                                                          public function detaile_price_print($id_invoice = null)
                                                                                          {
                                                                                          return $this->db->query("SELECT  concat('Rp ', format(payment + code_payment, 0)) as pay, concat('Rp ', format(code_payment, 0)) as code_payment, status
                                                                                                                  FROM tbl_invoice WHERE code_invoice ='$id_invoice'
                                                                                                                  ")->row();
                                                                                                                  }

                                                                                                                  public function update($id_invoice, $img, $payment, $code_payment, $datess)
                                                                                                                  {
                                                                                                                  $this->db->query("UPDATE tbl_invoice SET `status`='2', img='$img', payment ='$payment', code_payment='$code_payment', date_pay='$datess' WHERE code_invoice='$id_invoice'");
                                                                                                                  }

                                                                                                                  public function invoice_eo($id_invoice = null)
                                                                                                                  {
                                                                                                                  return $this->db->query("SELECT a.id , c.name as status, a.code_invoice,
                                                                                                                                          DATE_FORMAT(a.date_pay,'%d/%m/%Y %H:%m:%s') as date , a.status as id_status,
                                                                                                                                          CASE WHEN b.name_club != '' THEN  b.name_club ELSE d.name END as name_club
                                                                                                                                          from tbl_invoice a
                                                                                                                                          LEFT JOIN tbl_club b ON a.id_club = b.id
                                                                                                                                          LEFT JOIN tbl_status c ON a.`status` = c.id
                                                                                                                                          LEFT JOIN tbl_atlet d ON a.id_athlete =d.id
                                                                                                                                          WHERE   a.status in('1','2', '4') AND a.id_event ='$id_invoice'")->result();
                                                                                                                                          // a.`status`in('2', '4') AND
                                                                                                                                          }


                                                                                                                                          public function get_one_invoice($id_invoice = null)
                                                                                                                                          {
                                                                                                                                          return $this->db->query("SELECT a.code_invoice as id, b.name_club, c.name as status, DATE_FORMAT(a.create_date,'%d/%m/%Y') as date , a.code_invoice, b.email, b.no_tlp, a.img, a.id_event, a.status as id_status, a.remaks, concat('Rp. ', a.payment) as total
                                                                                                                                                                  from tbl_invoice a
                                                                                                                                                                  LEFT JOIN tbl_club b ON a.id_club = b.id
                                                                                                                                                                  LEFT JOIN tbl_status c ON a.`status` = c.id
                                                                                                                                                                  WHERE a.code_invoice='$id_invoice'")->row();
                                                                                                                                                                  }


                                                                                                                                                                  public function update_set($table, $data, $where)
                                                                                                                                                                  {
                                                                                                                                                                  $this->db->where($where)->update($table, $data);
                                                                                                                                                                  }

                                                                                                                                                                  public function get_invoice($id_invoice)
                                                                                                                                                                  {
                                                                                                                                                                  return $this->db->query("SELECT
                                                                                                                                                                                          a.code_invoice,
                                                                                                                                                                                          CASE

                                                                                                                                                                                          WHEN a.id_club IS NULL THEN
                                                                                                                                                                                          b.NAME ELSE c.name_club
                                                                                                                                                                                          END AS name,
                                                                                                                                                                                          d.NAME AS name_event,
                                                                                                                                                                                          CASE

                                                                                                                                                                                          WHEN a.id_club IS NULL THEN
                                                                                                                                                                                          'Athlete Name' ELSE 'Club Name'
                                                                                                                                                                                          END AS status_namae,
                                                                                                                                                                                          CASE

                                                                                                                                                                                          WHEN a.id_club IS NULL THEN
                                                                                                                                                                                          '-' ELSE c.official
                                                                                                                                                                                          END AS official, e.name as status
                                                                                                                                                                                          FROM
                                                                                                                                                                                          tbl_invoice a
                                                                                                                                                                                          LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
                                                                                                                                                                                          LEFT JOIN tbl_club c ON a.id_club = c.id
                                                                                                                                                                                          LEFT JOIN tbl_event d ON a.id_event = d.id
                                                                                                                                                                                          LEFT JOIN tbl_status e ON a.status = e.id
                                                                                                                                                                                          WHERE
                                                                                                                                                                                          code_invoice = '$id_invoice'")->row();
                                                                                                                                                                                          }


                                                                                                                                                                                          public function data_invoices($id_invoice = null)
                                                                                                                                                                                          {
                                                                                                                                                                                          return  $this->db->query("SELECT CONCAT(id_athlete,'-',id_race) as data FROM tbl_invoice_detail where code_invoice ='$id_invoice'")->result();
                                                                                                                                                                                          }

                                                                                                                                                                                          public function data_invoices_eo($id_event = null)
                                                                                                                                                                                          {
                                                                                                                                                                                          return  $this->db->query("SELECT CONCAT(a.id_athlete,'-',a.id_race) as data FROM tbl_invoice_detail a
                                                                                                                                                                                                                   LEFT JOIN tbl_invoice b ON a.code_invoice = b.code_invoice
                                                                                                                                                                                                                   where b.id_event ='$id_event' AND b.status ='4'")->result();
                                                                                                                                                                                                                   }


                                                                                                                                                                                                                   // public function price_race($id_invoice = null)
                                                                                                                                                                                                                   // {
                                                                                                                                                                                                                   //     return $this->db->query("SELECT code_invoice, id_athlete, sum(price_race) as price_race FROM tbl_invoice_detail a
                                                                                                                                                                                                                   //         LEFT JOIN tbl_race b ON a.id_race = b.id
                                                                                                                                                                                                                   //         WHERE a.code_invoice='$id_invoice' and a.id_race in(15,16)  GROUP BY id_athlete
                                                                                                                                                                                                                   //         ")->result();
                                                                                                                                                                                                                   // }

                                                                                                                                                                                                                   // update

                                                                                                                                                                                                                   public function price_race($id_invoice = null)
                                                                                                                                                                                                                   {
                                                                                                                                                                                                                   return $this->db->query("SELECT  c.code_invoice, c.id_athlete, b.price as price_race FROM tbl_atlet a
                                                                                                                                                                                                                                           LEFT JOIN tbl_class_price b ON  b.id_class = a.idclass
                                                                                                                                                                                                                                           LEFT JOIN tbl_invoice_detail c ON c.id_athlete = a.id
                                                                                                                                                                                                                                           LEFT JOIN tbl_invoice d ON d.code_invoice = c.code_invoice AND b.id_event = d.id_event
                                                                                                                                                                                                                                           WHERE c.code_invoice = '$id_invoice'  GROUP BY a.id
                                                                                                                                                                                                                                           ")->result();
                                                                                                                                                                                                                                           }

                                                                                                                                                                                                                                           public function get_one_price($id_event = null)
                                                                                                                                                                                                                                           {
                                                                                                                                                                                                                                           return $this->db->query("SELECT sum(price_race) as sums FROM tbl_invoice_detail a
                                                                                                                                                                                                                                                                   LEFT JOIN tbl_race b ON a.id_race = b.id
                                                                                                                                                                                                                                                                   where code_invoice ='$id_event'")->row();
                                                                                                                                                                                                                                                                   }

                                                                                                                                                                                                                                                                   public function rekening($code_invoice= null)
                                                                                                                                                                                                                                                                   {
                                                                                                                                                                                                                                                                   return $this->db->join('tbl_event b','a.id_event = b.id','left')->select('b.rek_name, b.rek_nomor, b.rek_address')->where('code_invoice', $code_invoice)->get('tbl_invoice a')->row();
                                                                                                                                                                                                                                                                   }

                                                                                                                                                                                                                                                                   //public function count_mku_race_price($code_invoice = null ){
                                                                                                                                                                                                                                                                   //
                                                                                                                                                                                                                                                                   //    $sql = $this->db->query("    SELECT
                                                                                                                                                                                                                                                                   //    distinct b.id as id_athlete,  b.name, b.sex,  DATE_FORMAT(b.dob, '%d/%m/%Y') as bod, f.name as disname,
                                                                                                                                                                                                                                                                   //    concat('Rp ', format( e.price, 0)) as price,FLOOR(e.price) as price2,
                                                                                                                                                                                                                                                                   //     aa.name as clname, a.bib,
                                                                                                                                                                                                                                                                   //    d.name as mku,  CONCAT(i.`name`,' ',i.size_name) as tshirt,
                                                                                                                                                                                                                                                                   //    (SELECT   FLOOR(sum(bz.price)) FROM tbl_invoice az
                                                                                                                                                                                                                                                                   //        LEFT JOIN tbl_race_price bz ON az.id_event = bz.id_event
                                                                                                                                                                                                                                                                   //         JOIN tbl_race cz ON bz.id_race = cz.id AND cz.rp =1
                                                                                                                                                                                                                                                                   //        LEFT JOIN tbl_invoice_detail dz ON az.code_invoice = dz.code_invoice  AND dz.id_race = cz.id
                                                                                                                                                                                                                                                                   //        LEFT JOIN tbl_atlet ez ON dz.id_athlete = ez.id
                                                                                                                                                                                                                                                                   //        WHERE az.code_invoice='$code_invoice' AND cz.rp =1 AND dz.id_athlete = a.id_athlete  Group BY dz.id_athlete HAVING count(dz.id_athlete) > 1   ORDER BY cz.name ASC
                                                                                                                                                                                                                                                                   //) as count_rp
                                                                                                                                                                                                                                                                   //    from tbl_invoice_detail a
                                                                                                                                                                                                                                                                   //    LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_race c ON a.id_race = c.id
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_mku d on a.id_mku = d.id_mku   AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_class aa ON b.idclass = aa.id
                                                                                                                                                                                                                                                                   //    LEFT JOIN tbl_invoice ab ON ab.code_invoice = a.code_invoice
                                                                                                                                                                                                                                                                   //     LEFT JOIN tbl_class_price e on b.idclass = e.id_class AND e.id_event = ab.id_event
                                                                                                                                                                                                                                                                   //    WHERE a.code_invoice='$code_invoice' ORDER BY a.bib ASC");
                                                                                                                                                                                                                                                                   //
                                                                                                                                                                                                                                                                   //    return $sql->result();
                                                                                                                                                                                                                                                                   //}


public function count_mku_race_price($code_invoice = null ){
    $sql = $this->db->query("   SELECT
                                distinct b.id as id_athlete,  b.name, b.sex,  DATE_FORMAT(b.dob, '%d/%m/%Y') as bod, f.name as disname,
                                concat('Rp ', format( e.price, 0)) as price,FLOOR(e.price) as price2,
                                aa.name as clname, a.bib,
                                CONCAT(i.`name`,' ',i.size_name) as tshirt,
                                (SELECT   FLOOR(sum(bz.price)) FROM tbl_invoice az
                                                                                                                                                                                                                                                                                                LEFT JOIN tbl_race_price bz ON az.id_event = bz.id_event
                                                                                                                                                                                                                                                                                            JOIN tbl_race cz ON bz.id_race = cz.id AND cz.rp =1
                                                                                                                                                                                                                                                                                            LEFT JOIN tbl_invoice_detail dz ON az.code_invoice = dz.code_invoice  AND dz.id_race = cz.id
                                                                                                                                                                                                                                                                                            LEFT JOIN tbl_atlet ez ON dz.id_athlete = ez.id
                                                                                                                                                                                                                                                                                            WHERE az.code_invoice='$code_invoice' AND cz.rp =1 AND dz.id_athlete = a.id_athlete    ORDER BY cz.name ASC
                                                                                                                                                                                                                                                                                          ) as count_rp,
                                                                                                                                                                                                                                                                                          IF(d.name IS NULL ,
(SELECT mm.name FROM tbl_invoice_detail m    LEFT JOIN tbl_mku mm ON m.id_mku = mm.id_mku   WHERE m.code_invoice='$code_invoice' AND m.id_athlete = b.id GROUP BY m.id_athlete)
,d.name) as mku
                                                                                                                                                                                                                                                                                           from tbl_invoice_detail a
                                                                                                                                                                                                                                                                                           LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_race c ON a.id_race = c.id
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_mku d on a.id_mku = d.id_mku   AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_class aa ON b.idclass = aa.id
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_invoice ab ON ab.code_invoice = a.code_invoice
                                                                                                                                                                                                                                                                                           LEFT JOIN tbl_class_price e on b.idclass = e.id_class AND e.id_event = ab.id_event
                                                                                                                                                                                                                                                                                           WHERE a.code_invoice='$code_invoice' ORDER BY a.bib ASC");

                                                                                                                                                                                                                                                                                           return $sql->result();
                                                                                                                                                                                                                                                                   }

public function total_athlete_race_class($code_invoice = null){
$sql = $this->db->query("SELECT
FLOOR(e.price) +
(SELECT   FLOOR(sum(bz.price)) FROM tbl_invoice az
LEFT JOIN tbl_race_price bz ON az.id_event = bz.id_event
JOIN tbl_race cz ON bz.id_race = cz.id AND cz.rp =1
LEFT JOIN tbl_invoice_detail dz ON az.code_invoice = dz.code_invoice  AND dz.id_race = cz.id
LEFT JOIN tbl_atlet ez ON dz.id_athlete = ez.id
WHERE az.code_invoice='$code_invoice' AND cz.rp =1 AND dz.id_athlete = a.id_athlete    ORDER BY cz.name ASC
) as count_rp
from tbl_invoice_detail a
LEFT JOIN  tbl_atlet b ON a.id_athlete = b.id
LEFT JOIN tbl_race c ON a.id_race = c.id
LEFT JOIN tbl_mku d on a.id_mku = d.id_mku   AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
LEFT JOIN tbl_dicipline f on b.iddicipline = f.id
LEFT JOIN tbl_tshirt i ON b.id_tshirt = i.id
LEFT JOIN tbl_class aa ON b.idclass = aa.id
LEFT JOIN tbl_invoice ab ON ab.code_invoice = a.code_invoice
LEFT JOIN tbl_class_price e on b.idclass = e.id_class AND e.id_event = ab.id_event
WHERE a.code_invoice='$code_invoice' GROUP BY b.id ORDER BY a.bib ASC");

return $sql->result();
}

                                                                                                                                                                                                                                                                                           }
