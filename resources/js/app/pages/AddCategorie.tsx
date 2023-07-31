'use client';
import React, { useState } from 'react';

import { Button, Checkbox, Label, Modal, TextInput, Select, FileInput } from 'flowbite-react';
import Swal from 'sweetalert2'

export default function AddCategorie() {
  const [openModal, setOpenModal] = useState<string | undefined>();
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const url_element  = document.getElementById('categorie_url');
  const urlval : { value: string } = url_element;
  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
   
    fetch(urlval.value, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name,
        csrf_token:document.getElementById('csrf-token').value
      }),
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      setOpenModal(undefined);
    })
    .catch(err => {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: err
        })
    })
  }

  const props = { openModal, setOpenModal, email, setEmail };

  return (
    <>
      <Button onClick={() => props.setOpenModal('form-elements')}>Ajouter une Categorie</Button>
      <Modal show={props.openModal === 'form-elements'} size="md" popup onClose={() => props.setOpenModal(undefined)}>
        <Modal.Header />
        <Modal.Body>
          <div className="space-y-6">
            <h3 className="text-xl font-medium text-gray-900 dark:text-white">Ajouter une categorie</h3>
            <div>
              <div className="mb-2 block">
                <Label htmlFor="name" value="nom de la categorie" />
              </div>
              <TextInput id="name" type="text" value={name} onInput={(e: React.ChangeEvent<HTMLInputElement>) => setName(e.target.value)} required />
            </div>



            <div className="w-full">
              <Button onClick={handleSubmit}>Enregistrer</Button>
            </div>

          </div>
        </Modal.Body>
      </Modal>
    </>
  )
}


