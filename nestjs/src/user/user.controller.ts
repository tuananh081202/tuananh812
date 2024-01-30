import { BadRequestException, Body, Controller, Delete, Get, Param, ParseArrayPipe, Post, Put, Query, Req, SetMetadata, UploadedFile, UseGuards, UseInterceptors } from '@nestjs/common';
import { User } from './entities/user.entity';
import { UserService } from './user.service';
import { AuthGuard } from '../auth/auth.guard';
import { CreateUserDto } from './dto/create-user.dto';
import { UpdateUserDto } from './dto/update-user.dto';
import { FilterUserDto } from './dto/filter-user.dto';
import { ApiBearerAuth, ApiQuery, ApiTags } from '@nestjs/swagger';
import { FileInterceptor } from '@nestjs/platform-express';
import { storageConfig } from 'helpers/config';
import { extname } from 'path';

@ApiBearerAuth()
@ApiTags('User')
@Controller('user')
export class UserController {
    constructor(private userService: UserService) { }

    @UseGuards(AuthGuard)
    @SetMetadata('roles',['Admin'])
    @Get()
    findAll(@Query()query:FilterUserDto): Promise<User> {
        return this.userService.findAll(query);
}
    @UseGuards(AuthGuard)
    @Get(':id')
    findOne(@Param('id') id:string):Promise<User> {
        return this.userService.findOne(Number(id));
    }

    @UseGuards(AuthGuard)
    @Post('create')
    createUser(@Body() createUserDto:CreateUserDto):Promise<User> {
        return this.userService.create(createUserDto)
    }

    @UseGuards(AuthGuard)
    @Put(':id')
    update(@Param('id') id:string,updateUserDto:UpdateUserDto){
       return this.userService.update(Number(id),updateUserDto)
    }
    
    @Delete(':id')
    multipleDelete(@Query('ids',new ParseArrayPipe({items:String, separator:','})) ids: string[]) {
        console.log("delete multi=>",ids);
        return this.userService.multipleDelete(ids)
    }

    @UseGuards(AuthGuard)
    @Delete(':id')
    delete(@Param('id') id: string) {
        return this.userService.delete(Number(id));
    }

    @Post('upload-avatar')
    @UseGuards(AuthGuard)
    @UseInterceptors(FileInterceptor('avatar',{
        storage:storageConfig('avatar'),
        fileFilter:(req,file,cb)=>{
            const ext = extname(file.originalname);
            const allowedExtArr = ['.jpg', '.png', '.jpeg'];
            if (!allowedExtArr.includes(ext)) {
                req.fileValidationError = `Accept file ext are: ${allowedExtArr.toString()}`;
                cb(null, false);
            } else {
                const fileSize = parseInt(req.headers['content-length']);
                if (fileSize > 1024 * 1024 * 5) {
                    req.fileValidationError = 'File size is too large.Accept file size is less than 5MB';
                    cb(null, false);
                } else {
                    cb(null, true);
                }
            }
        }
}))
    uploadAvatar(@Req() req: any, @UploadedFile() file: Express.Multer.File) {
        console.log("upload_avatar")
        console.log("user_data",req.user_data)
        console.log(file);
        if(req.fileValidationError){
            throw new BadRequestException(req.fileValidationError);
        }
        if(!file){
            throw new BadRequestException('File is required!');
        }
        return this.userService.updateAvatar(req.user_data.id,file.destination+'/'+file.filename);
    }

}   
   
   
   



