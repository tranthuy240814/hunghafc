<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\TournamentReuqest;
use App\Repositories\TournamentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Utility;

class TournamentController extends Controller
{
    protected $tournamentRepository;
    protected $utility;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(
        TournamentRepository $tournamentRepository,
        Utility $ultity
    ) {
        $this->tournamentRepository = $tournamentRepository;
        $this->utility = $ultity;
    }
    public function index()
    {
        $listTournament = $this->tournamentRepository->index();
        return view ('admin.tournament.index', [
            'listTournament' => $listTournament,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_tour = config('tournament.type');
        $format_tour = config('tournament.format');
        return view ('admin.tournament.create',[
            'formatTour' => $format_tour,
            'type_tour' => $type_tour,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentReuqest $request)
    {
        $input = $request->except(['_token']);

        if (isset($input['image'])) {
            $img = $this->utility->saveImageLogo($input);
            if ($img) {
                $path = '/images/logo/' . $input['image']->getClientOriginalName();
                $input['image'] = $path;
            }
        }

        $this->tournamentRepository->store($input);
        return redirect()->to('list-tournament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postFile($input)
    {
        if ($input['image']) {
            $file = $input['image'];

            $typeFile = $file->getClientOriginalExtension();
            if ($typeFile == 'png' || $typeFile == 'jpg' || $typeFile == 'jpeg' ) {
                $fileSize = $file->getSize();
                if ($fileSize <= 1024000) {
                    $fileName = $file->getClientOriginalName();
                    $file->move('img', $fileName);
                    return $fileName;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
}
