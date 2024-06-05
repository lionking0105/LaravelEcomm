<?php

namespace Modules\Post\Service;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Modules\Core\Service\CoreService;
use Modules\Core\Traits\ImageUpload;
use Modules\Post\Models\Post;
use Modules\Post\Repository\PostRepository;

class PostService extends CoreService
{
    use ImageUpload;

    public PostRepository $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        parent::__construct($post_repository);
        $this->post_repository = $post_repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array<string, mixed>  $data
     * @return Post
     */
    public function store(array $data): Post
    {
        $post = $this->post_repository->create($data);

        if (isset($data['category'])) {
            $post->categories()->attach($data['category']);
        }

        if (isset($data['tags'])) {
            $post->tags()->attach($data['tags']);
        }

        return $post;
    }

    /**
     * Get the data for editing a post.
     *
     * @param  int  $id
     * @return Model
     */
    public function edit(int $id): Model
    {
        return $this->post_repository->findById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param  array<string, mixed>  $data
     * @return Model
     */
    public function update($id, array $data): Model
    {
        return $this->post_repository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->post_repository->delete($id);
    }

    /**
     * Search posts based on given data.
     *
     * @param  array<string, mixed>  $data
     * @return LengthAwarePaginator
     */
    public function search(array $data): LengthAwarePaginator
    {
        return $this->post_repository->search($data);
    }

    /**
     * Get all posts.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->post_repository->findAll();
    }

    /**
     * Show a specific post.
     *
     * @param  int  $id
     * @return Model|null
     */
    public function show(int $id): ?Model
    {
        return $this->post_repository->findById($id);
    }

    /**
     * Upload an image.
     *
     * @param  Request  $request
     * @return void
     */
    public function upload(Request $request): void
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
