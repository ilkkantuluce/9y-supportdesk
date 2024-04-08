<?php

namespace App\Http\Controllers;

use JiraCloud\Issue\IssueService;
use JiraCloud\JiraException;
use JiraCloud\Issue\JqlFunction;

use App\Http\Controllers\Controller as ParentController;


class TicketController extends ParentController
{
    public function list() {
    
        $jql = 'status not in (Resolved, Closed, Done)';
        
        try {
            $issueService = new IssueService();
        
            $result = $issueService->search($jql, 0, 1000);
    
            $issues = $result->issues;
            
        } catch (JiraException $e) {
            echo $e->getMessage();
            die;
        }
    
        return $this->view('ticket/list', [
            'issues' => $issues,
        ]);
    }

    public function showTickets($project) {
        $currentPage = $this->getQueryParam('page', 1);
    
        $jql = 'project = ' . $project . ' AND status not in (Resolved, Closed, Done)';
        
        try {
            $issueService = new IssueService();
        
            $result = $issueService->search($jql, $currentPage - 1, 10);
    
            $issues = $result->issues;
            
        } catch (JiraException $e) {
            echo $e->getMessage();
            die;
        }
    
        return $this->view('ticket/project', [
            'issues' => $issues,
            'results' => $result->total,
            'perPage' => $result->maxResults,
        ]);
    }
}
