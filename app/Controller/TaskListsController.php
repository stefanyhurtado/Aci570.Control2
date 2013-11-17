<?php
App::uses('AppController', 'Controller');
/**
 * TaskLists Controller
 *
 * @property TaskList $TaskList
 * @property PaginatorComponent $Paginator
 */
class TaskListsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskList->recursive = 0;
		$this->set('taskLists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaskList->exists($id)) {
			throw new NotFoundException(__('Invalid task list'));
		}
		$options = array('conditions' => array('TaskList.' . $this->TaskList->primaryKey => $id));
		$this->set('taskList', $this->TaskList->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TaskList->create();
			if ($this->TaskList->save($this->request->data)) {
				$this->Session->setFlash(__('The task list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task list could not be saved. Please, try again.'));
			}
		}
		$people = $this->TaskList->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TaskList->exists($id)) {
			throw new NotFoundException(__('Invalid task list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TaskList->save($this->request->data)) {
				$this->Session->setFlash(__('The task list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task list could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TaskList.' . $this->TaskList->primaryKey => $id));
			$this->request->data = $this->TaskList->find('first', $options);
		}
		$people = $this->TaskList->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TaskList->id = $id;
		if (!$this->TaskList->exists()) {
			throw new NotFoundException(__('Invalid task list'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaskList->delete()) {
			$this->Session->setFlash(__('The task list has been deleted.'));
		} else {
			$this->Session->setFlash(__('The task list could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TaskList->recursive = 0;
		$this->set('taskLists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TaskList->exists($id)) {
			throw new NotFoundException(__('Invalid task list'));
		}
		$options = array('conditions' => array('TaskList.' . $this->TaskList->primaryKey => $id));
		$this->set('taskList', $this->TaskList->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TaskList->create();
			if ($this->TaskList->save($this->request->data)) {
				$this->Session->setFlash(__('The task list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task list could not be saved. Please, try again.'));
			}
		}
		$people = $this->TaskList->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TaskList->exists($id)) {
			throw new NotFoundException(__('Invalid task list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TaskList->save($this->request->data)) {
				$this->Session->setFlash(__('The task list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task list could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TaskList.' . $this->TaskList->primaryKey => $id));
			$this->request->data = $this->TaskList->find('first', $options);
		}
		$people = $this->TaskList->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TaskList->id = $id;
		if (!$this->TaskList->exists()) {
			throw new NotFoundException(__('Invalid task list'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaskList->delete()) {
			$this->Session->setFlash(__('The task list has been deleted.'));
		} else {
			$this->Session->setFlash(__('The task list could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
