Create


$set  =  $this->Settings->newEntity();
  $data = $this->Settings->patchEntity($set, $this->request->data);
  if($this->Settings->save($data))

  read

  $this->Printers->find('all')->toArray();

  update : 

  $product = $this->Products->get($id,[
    'contain'=>['Productimages','Productprinters']
    ]);