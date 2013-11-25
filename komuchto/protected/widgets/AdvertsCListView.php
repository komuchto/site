<?php

class AdvertsCListView extends CListView{
    
    public function renderSorter()
    {
        //В качестве пейджера используем свой класс, со своими стилями
        //$this->pager = array('class'=>'MyPager');
 
        if($this->dataProvider->getItemCount()<=0 || !$this->enableSorting || empty($this->sortableAttributes))
            return;
        echo CHtml::openTag('div',array('class'=>$this->sorterCssClass))."\n";
        echo Yii::t('zii','Упорядочить по: ');
        echo "<ul>\n";
        $sort=$this->dataProvider->getSort();
        foreach($this->sortableAttributes as $name=>$label)
        {
            if($label == 'created') {
                $link_name = "<span>дате</span>";
            } else {
                $link_name = "<span>цене</span>";
            }
 
            if(is_integer($name)){
 
                //если производят сортировку
                if(!empty($_GET['Adverts_sort'])) {
 
                    $sorter_type = $_GET['Adverts_sort'];
 
                    if($sorter_type == 'created' && $name == 1) {
                        echo $sort->link($label, $link_name, $htmlOptions=array('class'=>'created'));
 
                    } elseif($sorter_type == 'created.desc' && $name == 1) {
                        echo $sort->link($label, $link_name, $htmlOptions=array('class'=>'created'));
 
                    } elseif($sorter_type == 'price' && $name == 0) {
                        echo $sort->link($label, ''.$link_name, $htmlOptions=array('class'=>'price'));
 
                    } elseif($sorter_type == 'price.desc' && $name == 0) {
                        echo $sort->link($label, $link_name, $htmlOptions=array('class'=>'price'));
 
                    } else {
                        echo $sort->link($label, $link_name);
                    }
 
 
                } else {
 
                    if($label == 'created') {
                        echo $sort->link($label, $link_name, $htmlOptions=array('class'=>'created'));
                    } else {
                        echo $sort->link($label, $link_name, $htmlOptions=array('class'=>'price'));
                    }
                }
 
            } else {
                echo $sort->link($name,$label);
            }
        }
        echo "</ul>";
        echo $this->sorterFooter;
        echo CHtml::closeTag('div');
    }
}

?>
