<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\ResourceController;

class ProductController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.products';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::products';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Product::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'Product';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'name' => 'required|max:255',
                'category_id' => 'required|max:255',
                'price' => 'required|max:255',
                'size' => 'required|max:255',
                'note' => 'nullable|max:255',
                'note_1' => 'nullable|max:255',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * Used to validate update.
     *
     * @param $record
     * @return array
     */
    private function resourceUpdateValidationData($record)
    {
        return [
            'rules' => [
                'name' => 'required|max:255',
                'category_id' => 'required',
                'price' => 'required|max:255',
                'size' => 'required',
                'note' => 'nullable|max:255',
                'note_1' => 'nullable|max:255',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param null $record
     * @return array
     */
    private function getValuesToSave(Request $request, $record = null)
    {
        $creating = is_null($record);
        $values = [];
        $values['name'] = $request->input('name', '');
        $values['category_id'] = $request->input('category_id', '');
        $values['price'] = $request->input('price', '');
        $values['size'] = $request->input('size', '');
        $values['note'] = $request->input('note', '');
        $values['note_1'] = $request->input('note_1', '');

        return $values;
    }

    private function alterValuesToSave(Request $request, $values)
    {
        return $values;
    }

    /**
     * @param $record
     * @return bool
     */
    private function checkDestroy($record)
    {

        return true;
    }

    /**
     * Retrieve the list of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $perPage
     * @param string|null $search
     * @return \Illuminate\Support\Collection
     */
    private function getSearchRecords(Request $request, $perPage = 15, $search = null)
    {
        return $this->getResourceModel()::when(! empty($search), function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('note', 'like', "%$search%");
            });
        })->paginate($perPage);
    }
}
