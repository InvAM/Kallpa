<?php
include_once "models/etapacontrato.php";

class EtapaContratoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO etapa_contrato (IDContrato,IDEtapa,DNI_Em,Fecha_Et)
            VALUES (:idcontrato,:idetapa,:dni_em,:fecha)');
            $query->execute([
                'idcontrato' => $datos['IDContrato_G'],
                'idetapa' => $datos['IDEtapa_G'],
                'dni_em' => $datos['DNI_Em_T'],
                'fecha' => $datos['Fecha']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function get()
    {
        $etapascontratos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDContrato,IDEtapa,DNI_Em,Fecha_Et FROM etapa_contrato');
            $query->execute();
            while ($row = $query->fetch()) {
                $etapacontrato = new EtapaContrato();
                $etapacontrato->IDContrato = $row['IDContrato'];
                $etapacontrato->IDEtapa = $row['IDEtapa'];
                $etapacontrato->DNI_Em = $row['DNI_Em'];
                $etapacontrato->Fecha_Et = $row['Fecha_Et'];
                array_push($etapascontratos, $etapacontrato);
            }
            return $etapascontratos;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getInstalacion()
    {
        $etapascontratos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDContrato,IDEtapa,DNI_Em,Fecha_Et FROM etapa_contrato WHERE IDEtapa=1');
            $query->execute();
            while ($row = $query->fetch()) {
                $etapacontrato = new EtapaContrato();
                $etapacontrato->IDContrato = $row['IDContrato'];
                $etapacontrato->IDEtapa = $row['IDEtapa'];
                $etapacontrato->DNI_Em = $row['DNI_Em'];
                $etapacontrato->Fecha_Et = $row['Fecha_Et'];
                array_push($etapascontratos, $etapacontrato);
            }
            return $etapascontratos;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getHabilitacion()
    {
        $etapascontratos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDContrato,IDEtapa,DNI_Em,Fecha_Et FROM etapa_contrato WHERE IDEtapa=2');
            $query->execute();
            while ($row = $query->fetch()) {
                $etapacontrato = new EtapaContrato();
                $etapacontrato->IDContrato = $row['IDContrato'];
                $etapacontrato->IDEtapa = $row['IDEtapa'];
                $etapacontrato->DNI_Em = $row['DNI_Em'];
                $etapacontrato->Fecha_Et = $row['Fecha_Et'];
                array_push($etapascontratos, $etapacontrato);
            }
            return $etapascontratos;
        } catch (PDOException $e) {
            return [];
        }
    }
}