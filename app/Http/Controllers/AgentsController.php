<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Repositories\AgentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class AgentsController extends Controller
{
    protected $agentRepository;

    public function __construct(AgentRepository $agentRepository)
    {
        $this->middleware('auth');
        $this->agentRepository = $agentRepository;
    }

    public function index()
    {
        $agents = $this->agentRepository->paginated();
        return view('pages.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('pages.agents.create');
    }

    public function store(AgentRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->id();
        $input['agent_number'] = rand(1000, 999999);
        $agent = $this->agentRepository->create($input);
        if($agent) {
            Session::flash('alert-success', 'Agent added!!!');
            return redirect()->route('agents.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    public function show(Agent $agent)
    {
        return view('pages.agents.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        return view('pages.agents.edit', compact('agent'));
    }

    public function update(AgentRequest $request, Agent $agent)
    {
        $input = $request->all();
        $input['updated_by'] = auth()->id();
        $response = $this->agentRepository->update($input, $agent->id);
        if($response) {
            Session::flash('alert-success', 'Agent updated!!!');
            return redirect()->route('agents.show');
        }
        Session::flash('alert-danger','');
        return redirect()->back();
    }

    public function destroy(Agent $agent)
    {
        $response = $this->agentRepository->delete($agent->id);
        if($response) {
            return redirect()->route('agents.show');
        }
        Session::flash('alert-danger','Could not delete record!!!');
        return redirect()->back();
    }

    public function getAgents(Request $request)
    {
        $name = $request->get('name');
        return response($this->agentRepository->filter($name)->jsonSerialize(), Response::HTTP_OK);
    }
}
