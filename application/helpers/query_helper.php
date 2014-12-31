<?php
class Query_helper
{
    public static function add($tablename,$data)
    {
        $CI =& get_instance();
        $CI->db->insert($tablename, $data);
        $user = User_helper::get_user();

        if($CI->db->affected_rows() >0)
        {
            $id = $CI->db->insert_id();

            $historyData = Array(
                'table_id'=>$id,
                'table_name'=>$tablename,
                'data'=>json_encode($data),
                'user_id'=>$user->user_id,
                'action'=>'insert',
                'date'=>time()
            );

            $CI->db->insert('rnd_history', $historyData);
            return $id;
        }
        else
        {
            return false;
        }
    }

    public static  function update($tablename,$data,$conditions)
    {
        $CI =& get_instance();
        foreach($conditions as $condition)
        {
            $CI->db->where($condition);

        }

        $CI->db->update($tablename, $data);
        return ($CI->db->affected_rows() >0) ? true : false;

    }

    public static  function delete($tablename,$conditions)
    {
        $CI =& get_instance();
        foreach($conditions as $condition)
        {
            $CI->db->where($condition);

        }

        $CI->db->delete($tablename, $data);
        return ($CI->db->affected_rows() >0) ? true : false;

    }



    public static function get_info($tablename,$fieldnames,$conditions,$limit=0,$start=0)
    {
        $CI =& get_instance();

        if(is_array($fieldnames))
        {
            foreach($fieldnames as $fieldname)
            {
                $CI->db->select($fieldname);

            }
        }
        else
        {
            $CI->db->select($fieldnames);

        }

        foreach($conditions as $condition)
        {
            $CI->db->where($condition);
        }
        if($limit==0)
        {
            return $CI->db->get($tablename)->result_array();
        }
        if($limit==1)
        {
            return $CI->db->get($tablename)->row_array();
        }
        else
        {
            $CI->db->limit($limit,$start);
            return $CI->db->get($tablename)->result_array();
        }

    }

}