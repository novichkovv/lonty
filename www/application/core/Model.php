<?php
class Model
{
    public $recordErrors=array();
    public $table;
    public $relations;
    public $attributes;
    public $className;
    public $rules;
    public $fields;
    public function getClassName($name)
    {
        $name=str_replace('_model', '', $name);
        $this->modelName=$name;
    }
    public function selectDb($db)
    {
        mysql_connect(DB_HOST, DB_USER, DB_PASS) or die ("не могу создать соединение");
        mysql_select_db('u191001322_'.$db) or die (mysql_error());
        mysql_query("set character_set_client='utf8'");
        mysql_query("set character_set_results='utf8'");
        mysql_query("set collation_connection='utf8_general_ci'");
    }
    public function mysqlError($error='')
    {
        if(!$this->table)echo 'No table selected';
        echo $error.'<br />';
        die(mysql_error());
    }
    public function setTerm($attributes)
    {
        foreach($attributes as $attribute=>$vol)
        {
            if($attribute==="where")
            {
                $values=array();
                foreach($vol as $field=>$value)
                {
                    $values[]=$fiels."='".$value."'";
                }
                $values=implode(' AND ', $values);
                $where='WHERE '.$values;
            }
            elseif($attribute==="whereLike")
            {
                $values=array();
                foreach($vol as $field=>$value)
                {
                    $values[]=$fiels." LIKE '".$value."'";
                }
                $values=implode(' AND ', $values);
                $where='WHERE '.$values;
            }
            elseif($attribute==="order")
            {
                $values=implode(', ', $value);
                $order='ORDER BY '.$values;
            }
            elseif($attribute==="orderDesc")
            {
                $values=implode(', ', $value);
                $order='ORDER BY '.$values.' DESC';
            }
            elseif($attribute==="limit")
            {
                ($value[1])?$values=implode(', ', $value):$values=$value[0];
                $limit='LIMIT '.$values;
            }
        }
        if($where)$term=$where;
        if($order)$term.=' '.$order;
        if($limit)$term.=' '.$limit;
        return $term;

    }
    public function checkRules()
    {
        $result=true;
        $errors=array();
        if(isset($this->rules) && $this->rules)
        {
            foreach($this->rules as $field=>$rules)
            {
                foreach($rules as $key=>$vol)
                {
                    if($errors)break;
                    if(is_array($vol))
                    {
                        foreach($vol as $rule=>$value)
                        {
                            switch($rule)
                            {
                                case 'max':
                                    if(empty($_POST[$this->modelName][$field]))break;
                                    if(mb_strlen($_POST[$this->modelName][$field], 'utf-8')>$value)
                                        $errors[]='Поле "'.$this->attributes[$field].'" может содержать не более '.$value.' знаков!';
                                    break;
                                case 'min':
                                    if(empty($_POST[$this->modelName][$field]))break;
                                    if(mb_strlen($_POST[$this->modelName][$field], 'utf-8')<$value && !$_POST[$this->modelName][$field]=="")
                                        $errors[]='Поле "'.$this->attributes[$field].'" должно содержать не менее '.$value.' знаков!';
                                    break;
                                case 'preg':
                                    if(empty($_POST[$this->modelName][$field]))break;
                                    foreach($value as $key=>$regExp)
                                    {
                                        if($regExp==='eng')
                                        {
                                            if(!preg_match('/^[A-Za-z]+$/', $_POST[$this->modelName][$field]))
                                                $errors[]='Недопустимое значение поля "'.$this->attributes[$field].'": только английские буквы!';
                                        }
                                        if($regExp==='engInt')
                                        {
                                            if(!preg_match('/^[A-Za-z0-9]+$/', $_POST[$this->modelName][$field]))
                                                $errors[]='Недопустимое значение поля "'.$this->attributes[$field].'": только английские буквы и цифры!';
                                        }
                                        if($regExp==='rusSymb')
                                        {
                                            if(!preg_match('/^[^А-Яа-я]+$/', $_POST[$this->modelName][$field]))
                                                $errors[]='Недопустимое значение поля "'.$this->attributes[$field].'": только русские буквы и любые символы!';
                                        }
                                        if($regExp==='rusInt')
                                        {
                                            if(!preg_match('/^[^А-Яа-я0-9]+$/', $_POST[$this->modelName][$field]))
                                                $errors[]='Недопустимое значение поля "'.$this->attributes[$field].'": только русские буквы и цифры!';
                                        }
                                        if($regExp==='url')
                                        {
                                            if(!preg_match('~((?:ftp|https?)?://|(?:(www\.))*(?:[a-z0-9\-]+\.)*[a-z]{2,6}(:?/[a-z0-9\-?\[\]=&;#]+)?~i', $_POST[$this->modelName][$field]))
                                                $errors[]='Недопустимое значение поля "'.$this->attributes[$field].'"!';
                                        }
                                        //if(!preg_match($value, $_POST[$this->modelName][$field]))
                                        //$errors[]='Недопустимое значение поля "'.$this->attributes[$field].'"!';
                                    }
                                    break;
                            }
                        }
                    }
                    else
                    {
                        switch($vol)
                        {
                            case 'require':
                                if(empty($_POST[$this->modelName][$field]))
                                    $errors[]='Необходимо заполнить поле "'.$this->attributes[$field].'"!';
                                break;
                            case 'password':
                                if(empty($_POST[$this->modelName][$field]))break;
                                if(empty($_POST[$this->modelName]['confirm_'.$field]) ||
                                    $_POST[$this->modelName]['confirm_'.$field]!=$_POST[$this->modelName][$field])
                                    $errors[]='Поля "'.$this->attributes[$field].'" и "Подтвердите '.$this->attributes[$field].'" должны совпадать!';
                        }
                    }
                }
            }
        }
        if($errors)
        {
            print_r($errors);
            $this->recordErrors=$errors;
            $result=false;
        }
        return $result;
    }
    public function selectTable($tableName)
    {
        $this->table=$tableName;
    }
    public function selectAll($table='', $show=false)
    {
        if(!$table)$table=$this->table;
        $query="SELECT * FROM $table";
        return $this->getAll($query, $show);
    }
    function getAll($query,$show=false)
    {
        $res=mysql_query($query) or die($this->mysqlError($query));
        while($aRow=mysql_fetch_assoc($res))
        {
            $row[]=$aRow;
        }
        return $row;
    }
    function getRow($query,$show=false)
    {
        $res=mysql_query($query) or die($this->mysqlError($query));
        $row=mysql_fetch_row($res);
        return $row;
    }
    public function selectAllBy($attributes, $table='')
    {
        $query="SELECT * FROM $table ".$this->term($attributes);
        $res=mysql_query($query) or die($this->mysqlError($query));
        return mysql_fetch_array($res);
    }
    public function selectAllById($id, $table='')
    {
        $query="SELECT * FROM $table WHERE key='".$id."'";
        $res=mysql_query($query) or die($this->mysqlError($query));
        return mysql_fetch_array($res);
    }
    public function insert($table='')
    {
        if(!$table)$table=$this->table;
        $this->rules=$this->rules();
        $this->attributes=$this->attributes();
        if($this->checkRules())
        {
            foreach($_POST[$this->modelName] as $key=>$value)
            {
                $data[]=$key."='".$this->safetyCheck($value)."'";
            }
            $data=implode(', ', $data);
            $query="INSERT INTO $table SET $data ";
            //echo $query;
            mysql_query($query) or $this->mysqlError();
            return mysql_insert_id();
        }
    }
    public function safetyCheck($data)
    {
        $data = trim($data);
        $data = mysql_real_escape_string($data);
        return($data);
    }
    public function query($query)
    {
        mysql_query($query) or $this->mysqlError();
    }
    public function update($term,$table='')
    {
        if(!$table)$table=$this->table;
        $this->rules=$this->rules();
        $this->attributes=$this->attributes();
        if($this->checkRules())
        {
            foreach($_POST[$this->modelName] as $key=>$value)
            {
                $data[]=$key."='".$this->safetyCheck($value)."'";
            }
            $data=implode(', ', $data);
            $query="UPDATE $table SET $data ".$term;
            //echo $query;
            mysql_query($query) or $this->mysqlError();
        }
    }
    public function getFields($table = '')
    {
        if(!$table)$table = $this->table;
        $fields = array();
        $query = 'SHOW COLUMNS FROM '.$table;
        $res = $this->getAll($query);
        foreach($res as $k=>$v)
        {
            $fields[$v['Field']] =  $v['Field'];
            if($v['Key'] == 'PRI')
                $fields['pk'] = $v['Field'];
        }
        return $fields;

    }
    public function select_all($term = false)
    {
        if($term)
        {
            $where = array();
            foreach($term as $k=>$v)
            {
                $where[] = $k.'="'.$v.'"';
            }
            if($where)$where = "WHERE ".implode(' AND ', $where);
        }
        $query = 'SELECT * FROM '.$this->table.' '.($where ? $where : '').'';
        $row = $this->getAll($query);
        return($row);
    }
    public function getAllWithRels($id='')
    {
        $result = array();
        $relations = $this->relations();
        $fields = $this->fields();
        if(!$fields)$fields = $this->getFields();
        foreach($fields as $field=>$f)
        {
            if($field == 'pk')
                continue;
            $result['select'][] = $this->table.'.'.$field.' as '.$f;
        }
        if($relations)
        {
            $related_tables = $this->getRelatedTables($this->table);
            foreach($related_tables as $k=>$vol)
            {
                foreach($vol['fields'] as $field=>$f)
                    $result['select'][] = $vol['table'].'.'.$field.' as '.$f;
                $result['join'][] = 'LEFT JOIN '.$vol['table'].' ON '.$vol['relate_table'].'.'.$vol['relations']['foreign_key'].' = '.$vol['table'].'.'.$vol['relations']['key'];
            }
        }
        if($result['select'])$select = implode(', ',$result['select']);
        if($result['join'])$join = implode(' ', $result['join']);
        $query = 'SELECT
					'.$select.'
				  FROM
				  	'.$this->table.'
	  			  '.$join.'
	  			  '.($id ? 'WHERE '.$this->table.'.'.$fields['pk'].' = "'.$id.'"' : '
	  			  GROUP BY '.$this->table.'.'.$fields['pk'].'');
        $res = $this->getAll($query);
        $result = $this->handleResult($res);
        return $result;
    }
    public function getRelatedTables($rel_table)
    {
        $table_model = $rel_table.'_model';
        if(!$relations = $table_model::relations())return;
        $related_table = array();
        if($relations)
            $count = 0;
        foreach($relations as $table=>$params)
        {
            $related_table[$count]['table'] = $table;
            $related_table[$count]['relate_table'] = $rel_table;
            $related_table[$count]['relations'] = $params;

            $table_model = $table.'_model';

            $table_fields = $table_model::fields();
            if(!$table_fields)$table_fields = $this->getFields($table);

            $related_table[$count]['fields'] = $table_fields;
            $related_table[$count]['pk'] = $table_fields['pk'];
            unset($related_table[$count]['fields']['pk']);
            $count++;
            if(!$res = $this->getRelatedTables($table))continue;
            foreach($res as $k=>$v)
            {
                array_push($related_table, $v);
            }
        };
        return($related_table);
    }
    function handleResult($res)
    {
        $table = $this->table;
        $related_tables = $this->getRelatedTables($this->table);
        if(!$fields = $this->fields)$fields = self::fields();
        $result = array();
        $count = array();
        $count[0] = 0;
        for($i=1; $i<=count($related_tables); $i++)
        {
            $count[$i] = 0;
        }
        foreach($res as $k=>$row)
        {
            foreach($row as $key=>$vol)
            {
                if(in_array($key, $fields))
                    $result[$row[$fields['pk']]][$key] = $vol;
                foreach($related_tables as $i=>$param)
                {
                    if(in_array($key, $param['fields']))
                    {
                        $result[$row[$fields['pk']]][$param['table']][$row[$param['pk']]][$key] = $vol;
                    }
                }
            }
            foreach($count as $k=>$v)
            {
                $count[$k]++;
            }

        }
        return $result;
    }
    public function attributes(){}
    public function rules(){}
    public static function relations(){}
    public static function fields(){}
}
?>
