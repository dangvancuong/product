<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Traits\Controllers\ResourceController;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.posts';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::posts';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Post::class;

    /**
     * @var string
     */
    protected $resourceTitle = 'Posts';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'title' => 'required|min:3|max:255',
                'content' => 'required|min:3|max:255',
                'sapo' => 'required|min:3|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12048',
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
                'title' => 'required|min:3|max:255',
                'content' => 'required',
                'sapo' => 'required',
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
        $values['title'] = $request->input('title', '');
        $values['sapo'] = $request->input('sapo', '');
        $values['slug'] = str_slug($values['title'], '-') . '-' . time();
        $values['content'] = $request->input('content', '');
        $values['parent_id'] = $request->input('parent_id', '');
        if ($request->image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $values['image'] = '/images/' . $imageName;
        }
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
                $query->where('title', 'like', "%$search%")
                    ->orWhere('sapo', 'like', "%$search%");
            });
        })->paginate($perPage);
    }
}
