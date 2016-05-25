<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('sub_property',array('type'=>'checkbox','class'=>'','div'=>false,'label'=>false, 'style'=>'width:auto;','id'=>'select_resident',));
echo $this->Form->input('gender', array(
										'empty'    => '選択してください',
										'type'     => 'select',
										'options'  => array('a', 'ab', 'ga'),
										'class'    =>'form-control',
										'label'    => false,
										'div'      => false,
										'error'    => false,
										'required' => true,
									));
echo $this->Form->input('is_superuser',array('type'=>'checkbox','class'=>'','div'=>false,'label'=>false, 'value'=>'1', 'style'=>'width:auto;'));
echo $this->Form->error('Admin.zip','null',array('escape'=>false,'class'=>'text-danger'));
echo $this->Form->input('address',array('type'=>'text','error'=>true,'required'=>false,'label'=>false,'class'=>'form-control','style'=>'width:500px;','id'=>'address'));
echo $this->Form->input('password_confirm', array('style' => 'width: auto;', 'type'=>'password','error'=>false,'required'=>true,'label'=>false,'class'=>'form-control', 'value'=>''));
echo $this->Form->input('Admin.hometown_prefecture_code', array(
                                                                                'empty'    =>'選択してください',
                                                                                'type'     => 'select',
                                                                                'options'  => array('a', 'c'),
                                                                                'class'    => 'form-control',
                                                                                'label'    => false,
                                                                                'div'      => false,
                                                                                'error'    => false,
                                                                                'required' => false,
                                                                                'id'       => 'hometown_prefecture'
                                                                        ));
echo $this->Form->textarea('career',array('rows'=>1,'error'=>false,'required'=>false,'label'=>false,'class'=>'form-control',));
echo $this->html->link('<i class="fa fa-chevron-circle-left"></i> キャンセル', 'ngoss',array('class'=>'btn btn-sm btn-warning','escape' => false));
echo $this->Form->button('<i class="fa fa-dot-circle-o"></i> 登録',array('type'=>'submit','class'=>'btn btn-sm btn-primary'));
echo $this->Form->create('Admin',array('inputDefaults'=>array('div'=>false),'type'=>'file', 'enctype' => 'multipart/form-data')); 
echo $this->Form->input('email',array('type'=>'email','error'=>false,'required'=>false,'label'=>false,'class'=>'form-control ime-disable','id'=>'email',));



echo $this->Form->end('Save Post');
?>