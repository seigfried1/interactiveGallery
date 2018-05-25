<?php 
	namespace App\Controller;
	use App\Controller\AppController;
	class PostsController extends AppController{
		public function index(){
			$this->set('posts', $this->Posts->find('all'));
			
		}
		public function add(){
			$post = $this->Posts->newEntity();
			if($this->request->is('post')){
				$post = $this->Posts->patchEntity($post, $this->request->getData());
				if($this->Posts->save($post)){
					$this->Flash->success('Post Addedd Successfully', ['key'=>'message']);
					return $this->redirect(['action'=>'index']);
				}
				$this->Flash->error(__('Unable to add your post!'));
			}
			$this->set('post', $post);
		}
		public function view($id = Null){
			$posts = $this->Posts->get($id);
			$this->set('post', $posts);
		}





		public function edit($id = Null){
			$post = $this->Posts->get($id, [
				'contain' => []
			]);

			if($this->request->is(['patch','post','put'])){
				$post = $this->Posts->patchEntity($post, $this->request->getData());
				if($this->Posts->save($post)){
					$this->Flash->success(__('Post Updated Successfully'));
					return $this->redirect(['action'=>'index']);
				}
				else {
					$this->Flash->error(__('The record cannot be updated. Please try again'));
				}
			}
		}





		// 		if($this->Posts->save()){
		// 			$this->Flash->success('Post Updated Successfully', ['key'=>'message']);
		// 			return $this->redirect(['action'=>'index']);
		// 		}
		// 		$this->Flash->error(__('Unable to update your post!'));
		// 	}
		// 	$this->set('post', $post);
		// }

		// public function edit($id = Null) {
			
		// 	if ($this->request->is(array('post', 'put'))) {
		// 		if ($this->Post->save($this->request->data)) {
		// 			$this->Session->setFlash(__('The post has been saved.'));
		// 			return $this->redirect(array('action' => 'index'));
		// 		} else {
		// 			$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
		// 		}
		// 	} 
		// }
		public function delete($id = Null){
			$this->request->allowMethod(['post', 'delete']);
			$post = $this->Posts->get($id);
			if($this->Posts->delete($post)){
				$this->Flash->success('Post deleted Successfully', ['key'=>'message']);
					return $this->redirect(['action'=>'index']);
			}
		}
	}
 ?> 