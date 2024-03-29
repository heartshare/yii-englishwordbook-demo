<?php
/**
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
?>
<?php echo "<?php\n"; ?>

/**
 * <?php echo $modelClass; ?> class file.
 *
 * The followings are the available columns in table '<?php echo $tableName; ?>':
<?php foreach ($columns as $column): ?>
 * @property <?php echo $column->type . ' $' . $column->name . "\n"; ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
 * The followings are the available model relations:
<?php foreach ($relations as $name => $relation): ?>
 * @property <?php
    if (preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
    {
        $relationType = $matches[1];
        $relationModel = $matches[2];

        switch ($relationType) {
            case 'HAS_ONE':
                echo $relationModel . ' $' . $name . "\n";
            break;
            case 'BELONGS_TO':
                echo $relationModel . ' $' . $name . "\n";
            break;
            case 'HAS_MANY':
                echo $relationModel . '[] $' . $name . "\n";
            break;
            case 'MANY_MANY':
                echo $relationModel . '[] $' . $name . "\n";
            break;
            default:
                echo 'mixed $' . $name . "\n";
        }
    }
    ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?php echo $modelClass; ?> extends <?php echo $this->baseClass . "\n"; ?>
{
    /**
     * @see CActiveRecord::model()
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @see CActiveRecord::tableName()
     */
    public function tableName()
    {
        return '<?php echo $tableName; ?>';
    }

    /**
     * @see CModel::attributeLabels()
     */
    public function attributeLabels()
    {
        return array(
<?php foreach ($labels as $name => $label): ?>
            <?php echo "'$name' => '$label',\n"; ?>
<?php endforeach; ?>
        );
    }

    /**
     * @see CModel::rules()
     */
    public function rules()
    {
        return array(
<?php foreach ($rules as $rule): ?>
            <?php echo $rule.",\n"; ?>
<?php endforeach; ?>
            // on search
            array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @see CActiveRecord::relations()
     */
    public function relations()
    {
        return array(
<?php foreach ($relations as $name => $relation): ?>
            <?php echo "'$name' => $relation,\n"; ?>
<?php endforeach; ?>
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $c = new CDbCriteria;
<?php
foreach ($columns as $name => $column) {
    if ($column->type === 'string') {
        echo "        \$c->compare('$name', \$this->$name, true);\n";
    } else {
        echo "        \$c->compare('$name', \$this->$name);\n";
    }
}
?>

        return new CActiveDataProvider($this, array(
            'criteria' => $c,
            'pagination' => array(
                'pageVar' => 'page',
            ),
            'sort' => array(
                'sortVar' => 'sort',
                'defaultOrder' => array(
                    'id' => CSort::SORT_DESC,
                ),
            ),
        ));
    }
}
