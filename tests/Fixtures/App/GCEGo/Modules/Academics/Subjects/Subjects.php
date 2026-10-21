<?php

declare(strict_types=1);

namespace App\GCEGo\Modules\Academics\Subjects;

use App\Models\Subject;

use Gcego\Blueprints\Blueprint;
use Gcego\Blueprints\Definitions\{
    Name,
    Title,
    Description,
    Model,
    Table,
    Form,
    Infolist,
    Pages,
    Actions,
    Relations,
    Widgets
};
use Gcego\Blueprints\Registry\BlueprintProvider;
use Gcego\Blueprints\Registry\ProvidesBlueprint;

use App\GCEGo\Modules\Academics\Subjects\Pages\{
    ListSubjects,
    CreateSubject,
    EditSubject,
    ViewSubject
};

use App\GCEGo\Modules\Academics\Subjects\Tables\SubjectsTable;
use App\GCEGo\Modules\Academics\Subjects\Forms\SubjectForm;
use App\GCEGo\Modules\Academics\Subjects\Infolists\SubjectInfolist;

use App\GCEGo\Modules\Academics\Subjects\Actions\{
    DeleteSubject,
    ExportSubjects
};

use App\GCEGo\Modules\Academics\Subjects\Relations\{
    TopicsRelation,
    SyllabiRelation
};

use App\GCEGo\Modules\Academics\Subjects\Widgets\{
    SubjectsOverview,
    SubjectsStatistics
};

final class Subjects implements BlueprintProvider
{
    use ProvidesBlueprint;

    public function blueprint(): Blueprint
    {
        return Blueprint::define(
            Name::make('subjects'),
            Title::make('Subject Management'),
            Description::make('Manage academic subjects'),
            Model::make(Subject::class),

            Table::make(SubjectsTable::class),
            Form::make(SubjectForm::class),
            Infolist::make(SubjectInfolist::class),

            Pages::make([
                ListSubjects::class,
                CreateSubject::class,
                EditSubject::class,
                ViewSubject::class,
            ]),

            Actions::make([
                DeleteSubject::class,
                ExportSubjects::class,
            ]),

            Relations::make([
                TopicsRelation::class,
                SyllabiRelation::class,
            ]),

            Widgets::make([
                SubjectsOverview::class,
                SubjectsStatistics::class,
            ]),
        );
    }
}
