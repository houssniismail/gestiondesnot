<?php
class Matieremodel{
    private $data = [
        ['id' => '1', 'nom' => 'math'],
        ['id' => '2', 'nom' => 'physique'],
        ['id' => '2', 'nom' => 'physique']
    ];

    function consultertoutNotes() {
        return $this->data;
    }

    function ajouterNote($nom) {
        $id = count($this->data) + 1;
        $newNote = ['id' => (string)$id, 'nom' => $nom];
        $this->data[] = $newNote;
    }

    function modifierNote($id, $newNom) {
        foreach ($this->data as &$record) {
            if ($record['id'] === $id) {
                $record['nom'] = $newNom;
                return true; 
            }
        }
        return false; 
    }

    function supprimerNote($idToDelete) {
        foreach ($this->data as $key => $record) {
            if ($record['id'] === $idToDelete) {
                unset($this->data[$key]);
                return true; 
            }
        }
        return false; 
    }

    function consulterNotes(){
        return $this->consultertoutNotes();
    }

    function consulterunenote($id){
        foreach ($this->data as $record) {
            if ($record['id'] === $id) {
                return $record;
            }
        }
        return null; 
    }
}

$matiereModel = new Matieremodel();
echo '<br />';
echo 'function ajouterNote';
echo '<br />';
$matiereModel->ajouterNote('chemistry');
print_r($matiereModel->consultertoutNotes());
echo '<br />';
echo 'function modifier';
echo '<br />';
$matiereModel->modifierNote('2', 'updated_physique');
print_r($matiereModel->consultertoutNotes());
echo '<br />';
echo 'function suprimer';
echo '<br />';
$recordDeleted = $matiereModel->supprimerNote('2');
if ($recordDeleted) {
    echo "Record with ID '2' was deleted successfully.";
} else {
    echo "Record with ID '2' was not found.";
}
print_r($matiereModel->consultertoutNotes());
echo '<br />';
echo 'function consulterunenote';
echo '<br />';
$record = $matiereModel->consulterunenote('1');
if ($record) {
    echo "Record with ID '1' was found: ";
    print_r($record);
} else {
    echo "Record with ID '1' was not found.";
}



