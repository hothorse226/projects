<?php 
	class PostsController extends AppController {
	    public $helpers = array('Html', 'Form');
            public $components = array('Session','Paginator','RequestHandler');
            
            
	    public function index() {
	        $this->set('posts', $this->Post->find('all'));
	    }
            
            public function view($id = null){
                    if(empty($id)){
                            $this->set('error', 'The post must exist');
                    }
                    $this->Post->id = $id;
                    $post = $this->Post->read();
                    
            }
            
            public function add() {
                    if ($this->request->is('post')) {
//                        $this->Post->create();
                        debug($this->request->data);
                        debug($this->request->data['Post']['title']);exit;
                        if ($this->Post->save($this->request->data)) {
                            $this->Flash->success(__('Your post has been saved.'));
                            return $this->redirect(array('action' => 'index'));
                        }
                        $this->Flash->error(__('Unable to add your post.'));
                    }
                }
            
            public function edit($id = null) {
                if (!$id) {
                    throw new NotFoundException(__('Invalid post'));
                }
                $array = array('ngo', 'good', 'car', 'bike');
//                $arr = array('ngos', 'super');
                
                debug($a);
                $this->Post->recursive = -1;
                $post = $this->Post->findById($id);
//                    $now = $this->Admin->getDataSource()->expression('NOW()');
//                    debug($this->Post->getDataSource()->begin());exit;
//                debug(sha1($a));
                if (!$post) {
                    throw new NotFoundException(__('Invalid post'));
                }
//                    debug($this->referer());exit;   
                if ($this->request->is(array('post', 'put'))) {
//                        debug($this->request->data);exit;
                    
                    $this->Post->id = $id;
                    if ($this->Post->save($this->request->data)) {
                        $this->Flash->success(__('Your post has been updated.'));
                        return $this->redirect(array('action' => 'index'));
                    }
                    $this->Flash->error(__('Unable to update your post.'));
                }

                if (!$this->request->data) {
                    $this->request->data = $post;
                }
                $this->set(compact('array'));
            }
            
            public function delete($id) {
                if ($this->request->is('get')) {
                    throw new MethodNotAllowedException();
                }
                
                if ($this->Post->delete($id)) {
                    $this->Flash->success(
                        __('The post with id: %s has been deleted.', h($id))
                    );
                } else {
                    $this->Flash->error(
                        __('The post with id: %s could not be deleted.', h($id))
                    );
                }
                
                return $this->redirect(array('action' => 'index'));
            }
            
            public function test(){

//                    $case_articles = $this->CaseArticle->find('first', array(
//			'conditions' => array(
//				'id'              => $id,
//				'type'            => 1,
//				'publish_status'  => CaseArticle::PUBLISH_STATUS,
//				'publish_date <=' => date('Y-m-d'),
//                    	),
//                    ));   
                $this->Post->recursive = -1; 
                $return = $this->Post->find('all');
                $tags = $this->Post->find('all', array(
                    'joins' => array(
                            array(
                                    'type' => 'LEFT',
                                    'table' => 'users',
                                    'alias' => 'User',
                                    'conditions' => 'Post.user_id = User.id',
                            )
                    ),
                    'conditions' => array(
                            'User.id' => 1,
                    )
                ));
//                    $this->set('posts', $tags);

                $justusernames = $this->Post->find('list', array(
                    'fields' => array('Post.title')
                ));
                $usernameMap = $this->Post->find('list', array(
                    'fields' => array('Post.body', 'Post.created')
                ));
                $usernameGroups = $this->Post->find('list', array(
                    'fields' => array('Post.title', 'Post.created', 'Post.user_id')
                ));

                
                $post = array('bike', 'car');
                $this->set(compact('post'));
//                $this->set('posts', $justusernames);
            }
                
        }
?>

