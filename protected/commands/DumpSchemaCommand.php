<?php

class DumpSchemaCommand extends CConsoleCommand
{
    public function run($args)
    {
        $schema = $args[0];
        $tables = Yii::app()->db->schema->getTables($schema);
        $result = '';
        
        foreach ($tables as $def) {
            $result.="\$this->createTable('".$def->name."', array(\n";

            foreach ($def->columns as $col) {
                $result.= "    '".$col->name."' => '".$this->getColType($col)."',\n";
            }
            $result.= "), \$options);\n\n";
        }
        echo $result;
    }
    
    public function getColType($col)
    {
        if ($col->isPrimaryKey) {
            return 'pk';
        }
        $result = $col->dbType;

        if (strpos($col->dbType, 'int') !== false) {
            $result = 'integer';
        }
        if ($col->dbType === 'tinyint(1)') {
            $result = 'boolean';
        }
        if (strpos($col->dbType, 'varchar') !== false) {
            $result = 'string';
        }
        if ($col->dbType === 'binary') {
            $result = 'blob';
        }
        if (!$col->allowNull) {
            $result.= ' NOT NULL';
        }
        if ($col->defaultValue !== null) {
            $result.= " DEFAULT \'{$col->defaultValue}\'";
        }
        if ($col->comment !== '') {
            $result.= " COMMENT \'{$col->comment}\'";
        }
        return $result;
    }
}

