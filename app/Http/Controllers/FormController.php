<?php

#Docs https://packagist.org/packages/lesstif/jira-cloud-restapi
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as ParentController;

use JiraCloud\Issue\IssueService;
use JiraCloud\Issue\IssueField;
use DH\Adf\Node\Block\Document;
use JiraCloud\ADF\AtlassianDocumentFormat;


class FormController extends ParentController
{
    public function form() {
        return $this->view('form/form', [
        ]);
    }

    public function post() {
        $validated = $this->httpRequest->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        $issueField = new IssueField();

        $doc = (new Document())        
            ->paragraph()           // paragraph, can have child blocks (needs to be closed with `->end()`)
                ->text($this->httpRequest->input('message'))    // simple unstyled text            
            ->end();                 // closes `paragraph` node
        $descriptionObj = new AtlassianDocumentFormat($doc);

        $issueField->setProjectKey($this->httpRequest->input('project') ?? "")
                    ->setSummary($this->httpRequest->input('subject') ?? "")
                    ->setAssigneeAccountId('557058:50bf2356-06d5-4a7e-a43a-57e8092966c3')
                    ->setPriorityNameAsString('Highest')
                    ->setIssueTypeAsString('Bug')
                    ->setDescription($descriptionObj)
                    //->addVersionAsString('1.0.1')
                    //->addVersionAsArray(['1.0.2', '1.0.3'])
                    //->addComponentsAsArray(['Component-1', 'Component-2'])
                    //->setSecurityId(10001 /* security scheme id */)
                    ->setDueDateAsString('2023-06-19')
                    // or you can use DateTimeInterface
                    //->setDueDateAsDateTime(
                    //            (new DateTime('NOW'))->add(DateInterval::createFromDateString('1 month 5 day'))
                    // )
                    ->setParentKeyOrId('NI-2946')
                ;
        
        $issueService = new IssueService();

        $createdIssue = $issueService->create($issueField);
        
        return redirect()->route('form')->with('createdIssue', $createdIssue->key);
    }
}

