<?php

class DumpSchemaCommand extends CConsoleCommand
{
    /**
     * @see CConsoleCommand::getHelp()
     */
    public function getHelp()
    {
        return <<<EOD
USAGE
    yiic dumpschema <table_name>

EOD;
    }

    /**
     * @see CConsoleCommand::run()
     */
    public function run($args)
    {
        if (!isset($args[0])) {
            $this->usageError('テーブル名を入力してください。');
        }

        $schema = $args[0];
        $tables = Yii::app()->db->schema->getTables($schema);
        $result = '';
        
        foreach ($tables as $table) {
            $result.="// ".$table->name."\n";
            $result.="\$this->createTable('".$table->name."', array(\n";

            foreach ($table->columns as $column) {
                $result.= "    '".$column->name."' => '".$this->getColumnType($column)."',\n";
            }
            $result.= "), \$options);\n\n";
        }
        echo $result;
    }
    
    /**
     * Gets the convert column type.
     * @param string $column the column type
     * return string the convert column type
     */
    public function getColumnType($column)
    {
        if ($column->isPrimaryKey) {
            return 'pk';
        }

        $result = $column->dbType;

        if (strpos($column->dbType, 'int') !== false) {
            $result = 'integer';
        }
        if ($column->dbType === 'tinyint(1)') {
            $result = 'boolean';
        }
        if (strpos($column->dbType, 'varchar') !== false) {
            $result = 'string';
        }
        if ($column->dbType === 'binary') {
            $result = 'blob';
        }

        if (!$column->allowNull) {
            $result.= ' NOT NULL';
        }
        if ($column->defaultValue !== null) {
            $result.= " DEFAULT \'{$column->defaultValue}\'";
        }
        if ($column->comment !== '') {
            $result.= " COMMENT \'{$column->comment}\'";
        }

        return $result;
    }
}

