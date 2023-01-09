<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'name',
            'type' => 'text'
        ]); 

        CRUD::addColumn([
            'name' => 'name',
            'type' => 'text'
        ]);

        CRUD::addColumn([
            'name' => 'status',
            'type' => 'select_from_array',
            'options' => [
                'active' => 'Active',
                'inactive' => 'Inactive'
            ],
        ]);

        CRUD::addColumn([
            'name' => 'product_type.name',
            'type' => 'text',
            'label' => 'Product Type'
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'type' => 'datetime'
        ]);

        CRUD::addColumn([
            'name' => 'updated_at',
            'type' => 'datetime'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'name' => 'required',
            'status' => 'required',
            'product_type_id' => 'required',
        ]);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
        ]);

        CRUD::addField([
            'label' => 'Product Type',
            'name' => 'product_type_id',
            'type' => 'select',
            'entity' => 'product_type',
            'model' => 'App\Models\ProductType',
            'attribute' => 'name',
        ]);

        CRUD::addField([
            'name' => 'status',
            'type' => 'select_from_array',
            'options' => ['active' => 'Active', 'inactive' => 'Inactive'],
            'allows_null' => false,
            'default' => 'active',
        ]);

        CRUD::addField([
            'name' => 'description',
            'type' => 'textarea'
        ]);

        CRUD::addField([
            'name' => 'sizes',
            'type' => 'table',
            'label' => 'Sizes',
            'entity_singular' => 'size',
            'columns' => [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Size Name',
                ],
                [
                    'name' => 'description',
                    'type' => 'text',
                    'label' => 'Description',
                ],
                [
                    'name' => 'price',
                    'type' => 'number',
                    'label' => 'Price'
                ]
            ],
            'min' => 1,
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
