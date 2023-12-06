<?php
include_once "models/contrato.php";
include_once "models/contratoespecial.php";
class ContratoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $contratos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDContrato, Fecha_Con, NumeroRadicado_Con,PuntoInstalacion_Con,numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria, IDTipoInst from contrato');
            $query->execute();
            while ($row = $query->fetch()) {
                $contrato = new Contrato();
                $contrato->IDContrato = $row['IDContrato'];
                $contrato->Fecha_Con = $row['Fecha_Con'];
                $contrato->NumeroRadicado_Con = $row['NumeroRadicado_Con'];
                $contrato->PuntoInstalacion_Con = $row['PuntoInstalacion_Con'];
                $contrato->numSum = $row['numSum'];
                $contrato->estado = $row['estado'];
                $contrato->IDDomicilio = $row['IDDomicilio'];
                $contrato->DNI_cli = $row['DNI_cli'];
                $contrato->DNI_Em = $row['DNI_Em'];
                $contrato->IDGabineteCategoria = $row['IDGabineteCategoria'];
                $contrato->IDTipoInst = $row['IDTipoInst'];
                array_push($contratos, $contrato);
            }
            return $contratos;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getAprobado()
    {
        $contratos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDContrato, Fecha_Con, NumeroRadicado_Con,PuntoInstalacion_Con,numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria, IDTipoInst from contrato where estado="Aprobado"');
            $query->execute();
            while ($row = $query->fetch()) {
                $contrato = new Contrato();
                $contrato->IDContrato = $row['IDContrato'];
                $contrato->Fecha_Con = $row['Fecha_Con'];
                $contrato->NumeroRadicado_Con = $row['NumeroRadicado_Con'];
                $contrato->PuntoInstalacion_Con = $row['PuntoInstalacion_Con'];
                $contrato->numSum = $row['numSum'];
                $contrato->estado = $row['estado'];
                $contrato->IDDomicilio = $row['IDDomicilio'];
                $contrato->DNI_cli = $row['DNI_cli'];
                $contrato->DNI_Em = $row['DNI_Em'];
                $contrato->IDGabineteCategoria = $row['IDGabineteCategoria'];
                $contrato->IDTipoInst = $row['IDTipoInst'];
                array_push($contratos, $contrato);
            }
            echo '<script> console.log("Hola")</script>';
            return $contratos;
        } catch (PDOException $e) {
            echo '<script> console.log("Salio Mal")</script>';
            return [];
        }
    }

    public function insert($datos)
    {

        try {
            $query = $this->db->connect()->prepare('INSERT INTO contrato(IDContrato,Fecha_Con,NumeroRadicado_Con,PuntoInstalacion_Con,
            numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria,IDTipoInst) VALUES(:idcontrato,:fecha,:numR,:puntoI,:numS,:esta,
            :iddomicilio,:dnicli,:dniem,:idgabinete,:idinstalacion)');
            $query->execute([
                'idcontrato' => $datos['IDContrato'],
                'fecha' => $datos['Fecha_Con'],
                'numR' => $datos['NumeroRadicado_Con'],
                'puntoI' => $datos['PuntoInstalacion_Con'],
                'numS' => $datos['numSum'],
                'esta' => $datos['estado'],
                'iddomicilio' => $datos['IDDomicilio'],
                'dnicli' => $datos['DNI_cli'],
                'dniem' => $datos['DNI_Em'],
                'idgabinete' => $datos['IDGabineteCategoria'],
                'idinstalacion' => $datos['IDTipoInst']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }
    public function getBusqueda($dniC)
    {
        $result = [];
        $query = $this->db->connect()->prepare('SELECT DNI_cli, IDContrato FROM contrato WHERE DNI_cli = :dniC');

        try {
            $query->execute(['dniC' => $dniC]);

            while ($row = $query->fetch()) {
                $result[] = [
                    'DNI_cli' => $row['DNI_cli'],
                    'IDContrato' => $row['IDContrato']
                ];
            }

            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function updateEvaluar($datos)
    {
        try {
            $query = $this->db->connect()->prepare('UPDATE contrato SET estado = :estado WHERE IDContrato = :IDContrato_c ');
            $query->execute([
                'estado' => $datos['Estado'],
                'IDContrato_c' => $datos['IDContrato'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getExcel()
    { 
        $contratos=[];
        try {
            $query = $this->db->connect()->prepare('SELECT con.IDContrato, con.Fecha_Con, con.NumeroRadicado_Con, con.PuntoInstalacion_Con, con.numSum, con.estado, 
                                                            con.IDDomicilio, d.Direccion_Dom, d.Interior_Dom, d.Piso_Dom, d.Nomb_Malla_Dom,
                                                            con.DNI_cli, c.Nombre_cli, c.Apellido_cli, c.FechaNacimiento_cli, c.Celular_cli,
                                                            con.DNI_Em, e.Nombre_Em, e.Apellido_Em,
                                                            con.IDGabineteCategoria, cg.Descripcion_Ga,
                                                            con.IDTipoInst, ti.Descripcion_TI                                                            
                                                            FROM contrato  con INNER JOIN cliente c ON con.DNI_cli = c.DNI_cli 
                                                                                INNER JOIN domicilio d ON con.IDDomicilio = d.IDDomicilio
                                                                                INNER JOIN empleado e ON con.DNI_em = e.DNI_em
                                                                                INNER JOIN categoria_gabinete cg ON con.IDGabineteCategoria = cg.IDGabineteCategoria
                                                                                INNER JOIN tipoinstalacion ti ON con.IDTipoInst = ti.IDTipoInst');
            $query->execute();
            while ($row = $query->fetch()) {
                $contrato = new ContratoEspecial();
                $contrato->IDContrato = $row['IDContrato'];
                $contrato->Fecha_Con = $row['Fecha_Con'];
                $contrato->NumeroRadicado_Con = $row['NumeroRadicado_Con'];
                $contrato->PuntoInstalacion_Con = $row['PuntoInstalacion_Con'];
                $contrato->numSum = $row['numSum'];
                $contrato->estado = $row['estado'];
                $contrato->IDDomicilio = $row['IDDomicilio'];
                $contrato->Direccion_Dom = $row['Direccion_Dom'];
                $contrato->Interior_Dom = $row['Interior_Dom'];
                $contrato->Piso_Dom = $row['Piso_Dom'];
                $contrato->Nomb_Malla_Dom = $row['Nomb_Malla_Dom'];
                $contrato->DNI_cli = $row['DNI_cli'];
                $contrato->Nombre_cli = $row['Nombre_cli'];
                $contrato->Apellido_cli = $row['Apellido_cli'];
                $contrato->FechaNacimiento_cli = $row['FechaNacimiento_cli'];
                $contrato->Celular_cli = $row['Celular_cli'];
                $contrato->DNI_Em = $row['DNI_Em'];
                $contrato->Nombre_Em = $row['Nombre_Em'];
                $contrato->Apellido_Em = $row['Apellido_Em'];
                $contrato->IDGabineteCategoria = $row['IDGabineteCategoria'];
                $contrato->Descripcion_Ga = $row['Descripcion_Ga'];
                $contrato->IDTipoInst = $row['IDTipoInst'];
                $contrato->Descripcion_TI  = $row['Descripcion_TI'];
                array_push($contratos, $contrato);
            }
            return $contratos;
            
        }catch (PDOException $e) {
            return false;
        }

    }

}