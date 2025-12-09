<?php
class Form {
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm() {
        echo "<form action='".$this->action."' method='POST' style='width:100%'>";
        echo "<table width='100%'>";
        foreach ($this->fields as $field) {
            echo "<tr><td align='right' width='20%' valign='top'>".$field['label']."</td>";
            echo "<td>";
            $value = isset($field['value']) ? $field['value'] : ""; // Handle default value
            
            if ($field['type'] == 'textarea') {
                echo "<textarea name='".$field['name']."' rows='4' style='width:100%'>".$value."</textarea>";
            } elseif ($field['type'] == 'text') {
                echo "<input type='text' name='".$field['name']."' value='".$value."' style='width:100%'>";
            }
            echo "</td></tr>";
        }
        echo "<tr><td></td><td><input type='submit' value='".$this->submit."'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    public function addField($name, $label, $type = "text", $value = "") {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['value'] = $value;
        $this->jumField++;
    }
}
?>