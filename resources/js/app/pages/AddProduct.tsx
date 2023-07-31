'use client';
import React, { useState } from 'react';

import { Button, Checkbox, Label, Modal, TextInput, Select, FileInput } from 'flowbite-react';

export default function AddProduct() {
  const [openModal, setOpenModal] = useState<string | undefined>();
  const [email, setEmail] = useState("");
  const [produit, setProduit] = useState({
    name: "",
    price: 0,
    categorie: "",
    image: "",
  });

  const props = { openModal, setOpenModal, email, setEmail };

  return (
    <>
      <Button onClick={() => props.setOpenModal('form-elements')}>Ajouter un produit</Button>
      <Modal show={props.openModal === 'form-elements'} size="md" popup onClose={() => props.setOpenModal(undefined)}>
        <Modal.Header />
        <Modal.Body>
          <div className="space-y-6">
            <h3 className="text-xl font-medium text-gray-900 dark:text-white">Ajouter produit</h3>
            <div>
              <div className="mb-2 block">
                <Label htmlFor="name" value="nom du produit" />
              </div>
              <TextInput id="name" type="text" required />
            </div>
            <div>
              <div className="mb-2 block">
                <Label htmlFor="price" value="prix du Produit" />
              </div>
              <TextInput id="price" type="number" required />
            </div>
            <div>
              <div className="mb-2 block">
                <Label htmlFor="Categorie" value="Categorie du Produit" />
              </div>
                <Select
            id="categorie"
            required
        >
                    <option>
                    United States
                    </option>
                    <option>
                    Canada
                    </option>
                    <option>
                    France
                    </option>
                    <option>
                    Germany
                    </option>
                </Select>
            </div>
            <div>
              <div className="mb-2 block">
                <Label htmlFor="image" value="image du produit" />
              </div>
              <FileInput id="image"  required />
            </div>
            <div>

              <div className="mb-2 block">
                <Label htmlFor="description" value="description du Produit" />
              </div>
              <TextInput id="description" type="text" required />
            </div>

            <div className="w-full">
              <Button>Enregistrer</Button>
            </div>

          </div>
        </Modal.Body>
      </Modal>
    </>
  )
}


