<?php
namespace App\Repositories;

use App\Models\Position;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PositionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PositionRepositoryEloquent extends BaseRepository implements PositionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Position::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
