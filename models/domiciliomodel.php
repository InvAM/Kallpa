<?php
include_once "models/domicilio.php";
class DomicilioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try{
            $query = $this->db->connect()->prepare('INSERT INTO domicilio(IDDomicilio, Direccion_Dom, Interior_Dom, Piso_Dom, Nomb_Malla_Dom,IDCondicion,IDEstrato,IDPredio,IDDistrito)
            VALUES (:id,:direc,:inte,:piso,:malla,:cond,:estra,:predio,:distrito)');
            $query->execute([
                'id' => $datos['IDDomicilio_reg'],
                'direc' => $datos['Direccion_Dom_reg'],
                'inte' => $datos['Interior_Dom_reg'],
                'piso' => $datos['Piso_Dom_reg'],
                'malla' => $datos['Nomb_Malla_Dom_reg'],
                'cond' => $datos['IDCondicion_reg'],
                'estra' => $datos ['IDEstrato_reg'],
                'predio' => $datos['IDPredio_reg'],
                'distrito' => $datos['IDDistrito_reg']
            ]);
            return true;
        } catch(PDOException $e){

            return false;

        }
    }

    public function get()
    {
        $items = [];
        try{
            $query = $this->db->connect()->prepare('SELECT IDDomicilio, Direccion_Dom,Interior_Dom,Piso_Dom,Nomb_Malla_Dom,IDCondicion,IDEstrato,IDPredio,IDDistrito FROM domicilio');
            $query->execute();
            while($row = $query->fetch()){
                $item = new Domicilio();
                $item->IDDomicilio =$row['IDDomicilio'];
                $item->Direccion_Dom = $row['Direccion_Dom'];
                $item->Interior_Dom = $row['Interior_Dom'];
                $item->Piso_Dom = $row['Piso_Dom'];
                $item->Nomb_Malla_Dom = $row['Nomb_Malla_Dom'];
                $item->IDCondicion = $row['IDCondicion'];
                $item->IDEstrato = $row['IDEstrato'];
                $item->IDpredido = $row['IDPredio'];
                $item->IDDistrito = $row['IDDistrito'];
                array_push($items,$item);
            }
            return $items;
        } catch(PDOException $e){
            return[];
        }
    }

    public function getById($id)
    {
        $item = new Domicilio();
        $query = $this->db->connect()->prepare('SELECT IDDomicilio, Direccion_Dom,Interior_Dom,Piso_Dom,Nomb_Malla_Dom,IDCondicion,IDEstrato,IDPredio,IDDistrito FROM domicilio WHERE IDDomicilio = :id');

        try{
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item = new Domicilio();
                $item->IDDomicilio =$row['IDDomicilio'];
                $item->Direccion_Dom = $row['Direccion_Dom'];
                $item->Interior_Dom = $row['Interior_Dom'];
                $item->Piso_Dom = $row['Piso_Dom'];
                $item->Nomb_Malla_Dom = $row['Nomb_Malla_Dom'];
                $item->IDCondicion = $row['IDCondicion'];
                $item->IDEstrato = $row['IDEstrato'];
                $item->IDpredido = $row['IDPredio'];
                $item->IDDistrito = $row['IDDistrito'];
            }
            return $item;
        } catch (PDOException $e){
            return[];
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare('UPDATE domicilio SET IDDomicilio = :idDom,  Direccion_Dom = :direccion, Interior_Dom = :interior, Piso_Dom = :piso,
                                                Nomb_Malla_Dom = :malla, IDCondicion = :condicion, IDEstrato = :estrato, IDPredio = :predio, IDDistrito = :distrito WHERE IDDomicilio = idDom');
        try{
            $query->execute([
                'idDom' => $item['IDDomicilio_reg'],
                'direccion' => $item['Direccion_Dom_reg'],
                'interior' => $item['Interior_Dom_reg'],
                'piso' => $item['Piso_Dom_reg'],
                'malla' => $item['Nomb_Malla_Dom_reg'],
                'condicion' => $item['IDCondicion_reg'],
                'estrato' => $item ['IDEstrato_reg'],
                'predio' => $item['IDPredio_reg'],
                'distrito' => $item['IDDistrito_reg']
            ]);
            return true;
        } catch (PDOException $e){
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM domicilio WHERE IDDomicilio = :id');
        try{
            $query->excecute([
                'id' => $id,
            ]);
            return true;
        } catch (PDOException $e){
            return false;
        }
    }


}